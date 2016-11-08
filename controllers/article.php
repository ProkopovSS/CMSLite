<?php
    class Article extends  controller{

  	public function __construct()
	{}

	public function index()
	{
	  $connect = new DB();

	  $fields = array('id_article','name','date','ss_categories_id_category');

	  $result = $connect->get_data_from_table("ss_article",$fields);

	  $this->set('articles', $result);

	  $fields_cat = array('id_category','name');

	  $result2 = $connect->get_data_from_table("ss_categories",$fields_cat);

	  $arrKey=array('key1'=>'ss_categories_id_category','key2'=>'id_category');

	  $result3=$this->joinArrayKey($result,$result2,$arrKey,'cat_',TRUE);

	  $headers = array('Id','Название','Дата','Раздел');

	  $parametrs = array( 		'header'		=>$headers,
	  					        'controller'	=>'article',
	  					        'template'		=>'admin',
	  					        'update'		=>'update_article',
						        'delete'		=>'delete_article',
						        'key'			=>'id_article');


	  $arr2 = array ('data'=>$result3, 'params'=>$parametrs);

	  $table=$this->HelperClass('table','GetTable',$arr2);
	  $this->set('table', $table);
	}

	public function get_article($id)
	{
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_article",$id,true);

	  $this->set('article', $result);
      $this->set('page',array('name'=>$result['cat_name'],'link'=>$result['ss_categories_id_category']));
	}

	public function insert_article()
	{
	  $connect = new DB();
	  $result = $connect->get_data_from_table("ss_categories");
	  $this->set('categories', $result);

	  $result2 = $connect->get_data_from_table("ss_users");
	  $this->set('users', $result2);

	}

	public function insert($data)
	{
		if(!empty($data))
		{
		  $connect = new DB();
		  $status=0;
		  if($date['status']=TRUE){$status=1;}

		  $article= array( 'name'	  					=>$data['name'],
		  				   'text'	   					=>$data['text'],
		                   'status'    					=>$status,
		                   'title'     					=>$data['title'],
		                   'ss_categories_id_category'	=>$data['categori'],
		                   'ss_users_id_user'		    =>$data['user'],
		                   'date'						=>date("m.d.y")
		            		);

	      $connect->insert_data_from_table("ss_article",$article);
		}
	 }

	public function delete_article($data)
	{
	  $connect = new DB();
	  $key_element = array('id_article'=>$data);
	  $connect->delete_data_from_table("ss_article",$key_element);
	 }

   	public function update_article($data)
	{
	  $id=$data;

	  $connect = new DB();
	  $result = $connect->execut_stored_procedure("select_article",$id,true);
	  $this->set('article', $result);

	  $result3 = $connect->get_data_from_table("ss_categories");
	  $this->set('categories', $result3);

	  $result2 = $connect->get_data_from_table("ss_users");
	  $this->set('users', $result2);
	}

	public function update($data)
	{
		  $status=0;

		  $connect = new DB();
		  if($date['status']=TRUE){$status=1;}

		  $article= array( 'name'	  					=>$data['name'],
		  				   'text'	   					=>$data['text'],
		                   'status'    					=>$status,
		                   'title'     					=>$data['title'],
		                   'ss_categories_id_category'	=>$data['categori'],
		                   'ss_users_id_user'		    =>$data['user'],
		                   'date'						=>date("m.d.y"),
		                   );

		  $key_element = array('id_article'=>$data['id_article']);

	      $connect->update_data_from_table('ss_article',$article,$key_element);
		  }

}
?>