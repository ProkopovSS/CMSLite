<?php
   class rules extends  controller{
  	
  	public function __construct()
	{
		
	}

	public function index($data=null)
	{
	  $connect = new DB();
	  
	  $field = array('id','rules','group_id'); 
	  
	  $sort=$data['sort'];
	  
	  $limit=array( 'start' =>$data['page'],
	  				'count' =>10);
					
	  $result = $connect->get_data_from_table("ss_security_controllers",$field,$sort,$limit);
	  
	  $fields = array('id','name');
	  
	  $result2 = $connect->get_data_from_table("ss_group",$fields);
	  
	  $arrKey=array('key1'=>'group_id','key2'=>'id');
      
      $result3=$this->joinArrayKey($result,$result2,$arrKey,NULL,TRUE);
	   
	  $headers = array( 'id'		=>'Id',
	  					'rules'		=>'Правило',
	  					'group_id'	=>'Группа');	
	  
	  $parametrs = array( 'header'		=>$headers,
	  					  'controller'	=>'rules',
	  					  'template'	=>'admin',
	  					  'update'		=>'updateRule',
						  'delete'		=>'delete',
						  'key'			=>'id',
						  'page'		=>5);
	  	
	 
	  $arr2 = array ('data'=>$result3, 'params'=>$parametrs);

	  $table=$this->HelperClass('table','GetTable',$arr2);  
	  $this->set('table', $table);  
	}
	
	public function insertRule()
	{
	  $connect = new DB();
	  $result = $connect->get_data_from_table("ss_group");
	  $this->set('groups', $result);
	}
	
	public function updateRule($id)
	{
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_rule",$id,true);
	  $this->set('rule', $result);
	  
	  $connect = new DB();
	  $result = $connect->get_data_from_table("ss_group");
	  $this->set('groups', $result);
	  
	}
	
	public function update($data)
	{
		  $connect = new DB(); 
		  $connect = new DB();
		  $user	= array( 'rules'	=>$data['rules'],
						 'group_id' => $data['group_id']);
		
		  $key_element = array('id'=>$data['id']);		
		  	   
	      $connect->update_data_from_table('ss_security_controllers',$user,$key_element);
	}
	
	public function insert($data)
	{
		if(!empty($data))
		{
		  $connect = new DB();
		  $user	= array( 'rules'	=>$data['rules'],
						 'group_id' =>$data['group_id']);
						 				  
	      $connect->insert_data_from_table("ss_security_controllers",$user);
		}
	}
	
	public function delete($data)
	{
	  $connect = new DB();
	  $key_element = array('id'=>$data);
	  $connect->delete_data_from_table("ss_security_controllers",$key_element);
	}
	
   }
?>