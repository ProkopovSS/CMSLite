<?php

class main extends  controller
{
  	
  public function __construct()
	{
		
	}
	
	public function index($id=NULL)
	{
		
	if($id==NULL)
	  {
	  	$connect = new DB();
	    $result = $connect->get_data_from_table("ss_article_view");
	    $this->set('articles', $result);
	   	$this->set('page','Главная');
	  }
	  
	else
		{
		 $connect = new DB();
	 	 $result = $connect->execut_stored_procedure("art_from_tags",$id);
		 $this->set('articles', $result);
		}
	}
 }
?>