<?php
   class login extends  controller{
  	
  	public function __construct()
	{
	
	}
	
	public function index()
	{
	
	}
	
	public function login_user($data)
	{
	  $user=$data['login'];	
	  $pass=$data['pass'];
	 
	  $connect = new DB();
	  $result = $connect->execut_stored_procedure_login($user,$pass);  
	  echo $result;
	  if($result>=0)
	  {
		 $ip	 =	$_SERVER["REMOTE_ADDR"];
		 $client =	$_SERVER["HTTP_USER_AGENT"];
		 $time	 =	time();
		 $str	 =	$ip.$client.$time; 
		 $key	 =	md5($str);
	     $connect = new DB();
		 $data=array('key' => $key, 'client' => md5($client), 'ip' => $ip , 'user_id' => $result, 'date'=> date("Y-m-d H:i:s"));
		 $connect->insert_data_from_table("ss_security",$data);
		 $this->set('key', $key);
         $_SESSION['key']=$key;
         $this->set('_url', $_SERVER['HTTP_REFERER']);
	  }
	 }
	
	public function log_out()
	{	
		unset($_SESSION['isLogin']);
		session_destroy();
    }
  
 }
?>