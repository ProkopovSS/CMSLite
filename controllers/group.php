<?php
   class group extends  controller{
  	
  	public function __construct()
	{
		
	}
	
	
	public function index()
	{
	  $connect2 = new DB();
	  $result = $connect2->get_data_from_table("ss_group");
	  
	  $headers = array('Id','Название','Описание');	
	  
	  $parametrs = array( 'header'		=>$headers,
	  					  'controller'	=>'group',
	  					  'template'	=>'admin',
	  					  'update'		=>'updateGroup',
						    'delete'		=>'delete',
						    'key'			=>'id');
	  	
	 
	  $arr2 = array ('data'=>$result, 'params'=>$parametrs);
	  $table=$this->HelperClass('table','GetTable',$arr2);  
	  
	  $this->set('groups', $table);
	}
	
	public function insertGroup()
	{
		
	}
	
	public function updateGroup($id)
	{
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_group",$id,true);
	  $this->set('group', $result);
	}
	
	public function update($data)
	{
		  $connect = new DB(); 
		  $group	= array( 'name' 	=>$data['name'],
		  				 	 'title'	=>$data['title'],
						 	);
		
		  $key_element = array('id'=>$data['id']);		
		  	   
	      $connect->update_data_from_table('ss_group',$group,$key_element);
	}
	
	public function insert($data)
	{
		if(!empty($data))
		{
		  $connect = new DB();
		  $group	= array( 'name' 	=>$data['name'],
		  				 	 'title'	=>$data['title'],
						 	);
						 				  
	      $connect->insert_data_from_table("ss_group",$group);
		}
	}
	
	public function delete($data)
	{
	  $connect = new DB();
	  $key_element = array('id'=>$data);
	  $connect->delete_data_from_table("ss_group",$key_element);
	}
	
   }
?>