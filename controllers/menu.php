<?php
   class menu extends  controller{
  	
  	public function __construct()
	{
		
	}
	
	public function index()
	{
	  $connect2 = new DB();
	  $result = $connect2->get_data_from_table("ss_menu");
	  $this->set('', $result);
	}
	
	public function indexMenu()
	{
	  $connect2 = new DB();
	  $result = $connect2->get_data_from_table("ss_menu");
	  
	  $headers = array('Id','Название','Описание');	
	  
	  $parametrs = array( 'header'		=>$headers,
	  					  'controller'	=>'menu',
	  					  'template'	=>'admin',
	  					  'update'		=>'updateMenu',
						  'delete'		=>'delete',
						  'key'			=>'id_category');
	  	
	 
	  $arr2 = array ('data'=>$result, 'params'=>$parametrs);
	  $table=$this->HelperClass('table','GetTable',$arr2);  
	  $this->set('menu', $table);
	  
	}
	
	public function insertMenu()
	{
		
	}
	
	public function updateMenu($id)
	{
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_menu",$id,true);
	  $this->set('Menu', $result);
	}
	
	public function update($data)
	{
		  $connect = new DB(); 
		  $Menu	= array( 'name' 	=>$data['name'],
		  				 'title'	=>$data['title']);
		
		  $key_element = array('id'=>$data['id']);		
		  	   
	      $connect->update_data_from_table('ss_menu',$Menu,$key_element);
	}
	
	public function insert($data)
	{
		if(!empty($data))
		{
		  $connect = new DB();
		  $Menu	= array( 'name' 	=>$data['name'],
		  				 'title'	=>$data['title']);
						 				  
	      $connect->insert_data_from_table("ss_menu",$Menu);
		}
	}
	
	public function delete($data)
	{
	  $connect = new DB();
	  $key_element = array('id'=>$data);
	  $connect->delete_data_from_table("ss_menu",$key_element);
	}
	
   }
?>