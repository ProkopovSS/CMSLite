<?php
   class users extends  controller{
  	
  	public function __construct()
	{
		
	}

	public function index()
	{
	  $connect = new DB();
	  $result = $connect->get_data_from_table("ss_users");
	  
	  $fields = array('id','name');
	  
	  $result2 = $connect->get_data_from_table("ss_group",$fields);
	  
	  $arrKey=array('key1'=>'group_id','key2'=>'id');
      
      $result3=$this->joinArrayKey($result,$result2,$arrKey,NULL,TRUE);
	  
	  $headers = array('Id','E-mail','Пароль','Отображаемое имя','Группа');	
	  
	  $parametrs = array( 'header'		=>$headers,
	  					  'controller'	=>'users',
	  					  'template'	=>'admin',
	  					  'update'		=>'updateUser',
						  'delete'		=>'delete',
						  'key'			=>'id_user');
	  	
	  $arr2 = array ('data'=>$result3, 'params'=>$parametrs);

	  $table=$this->HelperClass('table','GetTable',$arr2);  
	  $this->set('table', $table);  
	}
	
	public function insertUser()
	{
	  $connect = new DB();
	  $result = $connect->get_data_from_table("ss_group");
	  $this->set('groups', $result);
	}
	
	public function updateUser($id)
	{
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_user",$id,true);
	  $this->set('user', $result);
	  
	  $connect = new DB();
	  $result = $connect->get_data_from_table("ss_group");
	  $this->set('groups', $result);
	  
	}
	
	public function update($data)
	{
		  $connect = new DB(); 
		  $user	= array( 'e-mail' 	=>$data['e-mail'],
		  				 'password'	=>$data['password'],
						 'display_name'	=>$data['display_name'],
						 'group_id'    => $data['group_id']);
		
		  $key_element = array('id_user'=>$data['id']);		
		  	   
	      $connect->update_data_from_table('ss_users',$user,$key_element);
	}
	
	public function insert($data)
	{
		if(!empty($data))
		{
		  $connect = new DB();
		  $user	= array( 'e-mail' 	=>$data['e-mail'],
		  				 'password'	=>$data['password'],
						 'display_name'	=>$data['display_name'],
						 'group_id'    => $data['group_id']);
						 				  
	      $connect->insert_data_from_table("ss_users",$user);
		}
	}
	
	public function delete($data)
	{
	  $connect = new DB();
	  $key_element = array('id_user'=>$data);
	  $connect->delete_data_from_table("ss_users",$key_element);
	}
	
   }
?>