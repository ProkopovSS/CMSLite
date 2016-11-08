<?php
   class tags extends  controller{
  	
  	public function __construct()
	{
		
	}
	
	public function index()
	{
	  $connect2 = new DB();
	  $result = $connect2->get_data_from_table("ss_categories");
	  $this->set('tags', $result);
	}
	
	public function indexTags()
	{
	  $connect2 = new DB();
	  $result = $connect2->get_data_from_table("ss_categories");
	  
	  $headers = array('Id','Название','Описание');	
	  
	  $parametrs = array( 'header'		=>$headers,
	  					  'controller'	=>'tags',
	  					  'template'	=>'admin',
	  					  'update'		=>'updateTag',
						  'delete'		=>'delete',
						  'key'			=>'id_category');
	  	
	 
	  $arr2 = array ('data'=>$result, 'params'=>$parametrs);
	  $table=$this->HelperClass('table','GetTable',$arr2);  
	  $this->set('tags', $table);
	  
	}
	
	public function insertTag()
	{
		
	}
	
	public function updateTag($id)
	{
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_categories",$id,true);
	  $this->set('tag', $result);
	}
	
	public function update($data)
	{
		  $connect = new DB(); 
		  $tag	= array( 'name' 	=>$data['name'],
		  				 'title'	=>$data['title']);
		
		  $key_element = array('id_category'=>$data['id']);		
		  	   
	      $connect->update_data_from_table('ss_categories',$tag,$key_element);
	}
	
	public function insert($data)
	{
		if(!empty($data))
		{
		  $connect = new DB();
		  $tag	= array( 'name' 	=>$data['name'],
		  				 'title'	=>$data['title']);
						 				  
	      $connect->insert_data_from_table("ss_categories",$tag);
		}
	}
	
	public function delete($data)
	{
	  $connect = new DB();
	  $key_element = array('id_category'=>$data);
	  $connect->delete_data_from_table("ss_categories",$key_element);
	}
	
   }
?>