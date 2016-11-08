<?php
 class security
	{
		public function __construct()
			{
	
			}
			
		public static function init($uri=NULL)
			{
				security::startSession();
				echo $_SESSION['user_id'];
				
				if(!isset($_SESSION['user_id']))
				{
					$_SESSION['user_id']=5;
				}				
				
				if(!isset($_SESSION['isLogin']) && isset($_SESSION['key']))
				{
                    $key=$_SESSION['key'];
					$connect = new DB();
					$result = $connect->execut_stored_procedure("get_from_secure",$key,true);
					$client = md5($_SERVER["HTTP_USER_AGENT"]);
					$ip=$_SERVER["REMOTE_ADDR"]; 
					if($key==$result['key'] && $client==$result['client'] && $ip==$result['ip'])
					 	
					 	{
							$_SESSION['isLogin']=true;
							$_SESSION['user_id']=$result['user_id'];
					 	}	
				}			

				security::rules($uri,$_SESSION['user_id']);
			}
		
		public function rules($uri,$user_id)
		{
			$pattern='/\/[a-z_A-Z_0-9]+\/[a-z_A-Z_0-9]+\/[a-z_A-Z]+|\/[a-z_A-Z_0-9]+\/[a-z_A-Z_0-9]+|\/[a-z_A-Z_0-9]+|\//';
	
			//echo $uri;
			preg_match($pattern, $uri, $matches);
			$rule_uri=$matches[0];
			//print_r($matches);
			$connect = new DB();
			$result = $connect->execut_stored_procedure_rule($rule_uri,$user_id);
	
			echo $rule_uri;
			echo $result;
			if($result>0) 
			{
				if(isset($_GET['tpl']))
						{
							controller::load_tpl($_GET['tpl']);	
						}
						
						else 
						{
							controller::load_tpl();
						}
			}
			else 
			{
				controller::load_tpl("blank");
			}
			
		}	
		
		public static function startSession($isUserActivity=true) 
		{
            $sessionLifetime = 300;
			$idLifetime = 60;

    		if ( session_id() ) return true;
    		session_name('BandsIT');
    		ini_set('session.cookie_lifetime', 0);
    		if ( ! session_start() ) return false;
    		$t = time();
			
    		if ( $sessionLifetime ) 
    		{
        	 	 if (isset($_SESSION['lastactivity']) && $t-$_SESSION['lastactivity'] >= $sessionLifetime ) 
					{
              			security::destroySession();
              			return false;
        	   		}
        	 	else 
        	 		{
               			if ($isUserActivity) $_SESSION['lastactivity'] = $t;
        			}
    		}

    		if ($idLifetime) 
    		{	
        		if (isset($_SESSION['starttime'])) 
					{
						if ($t-$_SESSION['starttime'] >= $idLifetime) 
						{
                	 		session_regenerate_id(true);
                	 		$_SESSION['starttime'] = $t;
            			}
        			}			
        		else  $_SESSION['starttime'] = $t;	
    		}
		
    		return true;
		}
		
		public function destroySession() 
		{
    		if (session_id())
    		{
        		session_unset();
        		setcookie(session_name(), session_id(), time()-60*60*24);
        		session_destroy();
    		}
		}
	
	}
?>