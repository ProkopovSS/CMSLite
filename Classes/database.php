<?php
 class DB 
    {
	 private  $path_db_conf; 	
	 private  $host = NULL;
	 private  $user = NULL;
	 private  $pass = NULL;
	 private  $db   = NULL;
	   
     function __construct() 
     {
     	$this->path_db_conf=$_SERVER['DOCUMENT_ROOT']."/config/db_config.php";
		
     	if (file_exists($this->path_db_conf))
		    {
		  	 include $this->path_db_conf;
		    }  
		   else
			{
				echo "ERROR: CONFIG NOT EXIST";
			}
			
			if (!isset($this->host))
			  {$this->host=$HOST_NAME;}
	        if (!isset($this->user))
			  {$this->user=$USER;}	
			if (!isset($this->pass))  
	          {$this->pass=$PASSWORD;}
			if (!isset($this->db))
	          {$this->db=$DATABASE_NAME;}	  
	 }

    private function db_connect()
     {	 
		 $link=mysql_pconnect($this->host,$this->user,$this->pass);
         if (!$link)
		   {
	      	echo "ERROR: NOT CONNECT TO HOST \n";
		   }
		 if (!mysql_select_db($this->db))
		  {
		  	echo "ERROR: NOT CONNECT TO DATA BASE ".mysql_error();
		  }     
		  return $link;
     }	 
	 
	 
	 function db_connect_i()
     {
     	
              $link = mysqli_init();
              mysqli_options($link, MYSQLI_INIT_COMMAND, "SET AUTOCOMMIT=0");
              mysqli_options($link, MYSQLI_OPT_CONNECT_TIMEOUT, 5);

              mysqli_real_connect($link, $this->host,$this->user,$this->pass, $this->db);     
			  if (mysqli_connect_errno()) 
				{
   					printf("Connect failed: %s\n", mysqli_connect_error());
   					exit();
				} 
				return $link;
     }	 

    public function get_data_from_table($table,$fields=null,$sort=null,$limit=null)
	{
		$link  = $this->db_connect();
		mysql_query("SET NAMES 'utf8'",$link); 
		mysql_query("SET CHARACTER SET 'utf8'",$link);
		mysql_query("SET SESSION collation_connection = 'utf8_general_ci'",$link);
		 
		
		$string='';
		if(isset($fields))
		{
			 while (list($key, $val) = each($fields)) 
			 {
			 	$string.="`".$table."`.`".$val."`, ";
			 }
			 
			 $string = preg_replace('/, $/', '', $string);
		}
		else {
			$string = '*';
		}
		 
		$query="SELECT ".$string."  FROM  `".$table."` ";
		
		if($sort!=null)
		{
			$query.=' ORDER BY `'.$sort.'`';
		}
		
		if($limit!=null)
		{
			if($limit['start']!=null && $limit['count']!=null)
				$query.=' limit '.$limit['start'].','.$limit['count'].' ';
		}
		
		$DATA=mysql_query($query);
		
		if (mysql_num_rows($DATA) == 0) 
		   {
           
           }
		$stack[]=array();
		array_pop($stack);
		
		while($result = mysql_fetch_assoc($DATA))
		  {
		   array_push($stack,$result);
		  }
		mysql_close($link);
		return $stack;
		
	}
	
	public function insert_data_from_table($table,$data)
	{
		 $link=$this->db_connect();
		 mysql_query("SET NAMES 'utf8'"); 
		 mysql_query("SET CHARACTER SET 'utf8'");
		 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
		 $query_target="insert into `".$table."` (";
		 $query_values=" values (";
         reset($data);
         while (list($key, $val) = each($data)) 
         {
            $query_target.="`".$key."`,"; 
			$val=mysql_real_escape_string($val);
			$query_values.="'".$val."',";
         }
		 $query_target = preg_replace('/\,$/', ')', $query_target);
		 $query_values=  preg_replace('/\,$/', ')', $query_values);
		 $query=$query_target.$query_values;
		 if (!mysql_query($query)) echo "ERROR: DATA NOT INSERT";
   		 mysql_close($link);
    }	
	
	
	public function update_data_from_table($table,$data,$key_element)
	{
		 $link=$this->db_connect();
		 mysql_query("SET NAMES 'utf8'"); 
		 mysql_query("SET CHARACTER SET 'utf8'");
		 mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
		 //print_r($data);
		 $query_target="update `".$table."` SET ";
		 $query_values=" values (";
         reset($data);
         while (list($key, $val) = each($data)) 
         {  
			$val=mysql_real_escape_string($val);
			$query_target.=" `".$key."`='".$val."',";
         }
		 $query_target = preg_replace('/\,$/', ' where ', $query_target);
		 
		 while (list($key, $val) = each($key_element)) 
         {  
			$val=mysql_real_escape_string($val);
			$query_target.=" `".$key."`='".$val."' and ";
         }
		 
		 $query_target = preg_replace('/ and $/', '', $query_target);
		 
		 $query=$query_target;
	
		 if (!mysql_query($query)) echo "ERROR: DATA NOT update";
		 mysql_close($link);
    }	
	

	public function delete_data_from_table($table,$key_element)
	{
		 $this->db_connect();
		 $query = "DELETE FROM `".$table."` WHERE ";
		
		 while (list($key, $val) = each($key_element)) 
         {  
			$val=mysql_real_escape_string($val);
			$query_target.=" `".$key."`='".$val."' and ";
         }
		 $query_target = preg_replace('/ and $/', '', $query_target);
		 $query.=$query_target;
	
		 if (!mysql_query($query)) echo "ERROR: DATA NOT DELETE"; 
	}
	
	public function execut_stored_procedure_login($user,$pass)
	{
        $this->db_connect();
		$query="SELECT  `login`('".$user."','".$pass."') AS `login`";
		$DATA=mysql_query($query);
		
		if (mysql_num_rows($DATA) == 0) 
		   {
             
           }
		$result = mysql_fetch_assoc($DATA);
		
		return $result['login'];
    }
	
	public function execut_stored_procedure_rule($rule,$user_id)
	{
        $this->db_connect();
		$query="SELECT  `rules`('".$rule."','".$user_id."') AS `rules`";
		//echo $query;
		$DATA=mysql_query($query);
		
		if (mysql_num_rows($DATA) == 0) 
		   {
             echo "No rows found, nothing to print so am exiting";
           }
		$result = mysql_fetch_assoc($DATA);
		
		return $result['rules'];
    }
	
	public function execut_stored_procedure($procedure_name,$value=null,$key=null)
	{
		
		$link = $this->db_connect_i();
	    $query = "CALL ".$procedure_name." ('".$value."')";
		$query1= "SET NAMES 'utf8'"; 
		$query2= "SET CHARACTER SET 'utf8'";
		$query3= "SET SESSION collation_connection = 'utf8_general_ci'";
		
		mysqli_real_query($link,$query1); 
		mysqli_real_query($link,$query2);
		mysqli_real_query($link,$query3);
		
	    $stack[]=array();
		array_pop($stack);
		
	    if (mysqli_real_query($link,$query))
         {
          if ($result = mysqli_store_result($link))
          {
          	
            while ($row = mysqli_fetch_assoc($result) )
             {
              array_push($stack,$row);
             }
           }   
         }
		mysqli_close($link);
		
		if($key)
		{
			$stack=$stack[0];	
		}
		
		return $stack;
	}
	
  }
?>