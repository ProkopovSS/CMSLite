<?php
   class Photo extends  controller{
  	
  	public function __construct()
	{
		
	}
	
	public function index()
	{
	  $connect2 = new DB();
	  $result = $connect2->get_data_from_table("ss_photo");
	  $this->set('photo', $result);
	}
	
	public function indexPhoto()
	{
	  $connect2 = new DB();
	  $result = $connect2->get_data_from_table("ss_photo");
	  
	  $headers = array('Id','Путь к фото','Описание','Дата');	
	  
	  $parametrs = array( 'header'		=>$headers,
	  					  'controller'	=>'photo',
	  					  'template'	=>'admin',
	  					  'update'		=>'updatePhoto',
						  'delete'		=>'delete',
						  'key'			=>'id');
	  	
	 
	  $arr2 = array ('data'=>$result, 'params'=>$parametrs);
	  $table=$this->HelperClass('table','GetTable',$arr2);  
	  $this->set('photo', $table);
	  
	}
	
	public function insertPhoto()
	{
		
	}
	
	public function updatePhoto($id)
	{
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_categories",$id,true);
	  $this->set('photo', $result);
	}
	
	public function update($data)
	{
		  $connect = new DB(); 
		  $tag	= array( 'link' 	=>$data['link'],
		  				 'title'	=>$data['title'],
						 'date'		=>date("m.d.y")
						 );
		
		  $key_element = array('id'=>$data['id']);		
		  	   
	      $connect->update_data_from_table('ss_photo',$photo,$key_element);
	}
	
	public function insert($data)
	{
		if(!empty($data))
		{
		  $connect = new DB();
		  
		  $photo	= array( 'name' 	=>$data['link'],
		  				 	 'title'	=>$data['title'],
							 'date'		=>date("m.d.y")
							 );
							 		 				  
	      $connect->insert_data_from_table("ss_photo",$photo);
		}
	}
	
	public function delete($data)
	{
	  $connect = new DB();
	  $key_element = array('id'=>$data);
	  $connect->delete_data_from_table("ss_photo",$key_element);
	}
	
   }
?>