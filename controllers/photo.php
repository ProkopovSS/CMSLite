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
	  
	  $headers = array('Id','Название','Описание','Ссылка','Дата','Порядок сортировки');	
	  
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
	  $result = $connect->execut_stored_procedure("select_photo",$id,true);
	  $this->set('photo', $result);
	}

	public function update($data)
	{
		  $connect = new DB();
		   $photo	= array( 'name' 	=>$data['name'],
		  				 	 'title'	=>$data['title'],
		  				 	 'link' 	=>"uploads/".basename($data['file']['photo']['name']),
							 'date'		=>date("m.d.y")
							 );
		  $key_element = array('id'=>$data['id']);

	      $connect->update_data_from_table('ss_photo',$photo,$key_element);
	}
	public function insert($data)
	{
		if(!empty($data))
		{
          //print_r($data['file']['photo']['name']);
         // copy($data['file']['photo']['tmp_name'],"uploads/".basename($data['file']['photo']['name']));
          $_file_=$data['file']['photo']['tmp_name'];
          $file_new = $this->ResizeImage( $_file_,basename($data['file']['photo']['name'],".jpg"));
          $connect = new DB();
		  $photo	= array( 'name' 	=>$data['name'],
		  				 	 'title'	=>$data['title'],
		  				 	 'link' 	=>$file_new,
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

    private function ResizeImage ($filename,$name)
    {
		$size=GetImageSize($filename);
		$src=ImageCreateFromJPEG($filename);
		$iw=$size[0];
		$ih=$size[1];
		$koe=$iw/150;
      	$new_file_name = "uploads/".$name.date("Ymdhms").'.jpg';
		$new_h=ceil ($ih/$koe);
		$dst=ImageCreateTrueColor (150, $new_h);
		ImageCopyResampled ($dst, $src, 0, 0, 0, 0, 150, $new_h, $iw, $ih);
        ImageJPEG ($dst, $_SERVER['DOCUMENT_ROOT'].$new_file_name,100);
		imagedestroy($src);
        return $new_file_name;
    }
   }
?>