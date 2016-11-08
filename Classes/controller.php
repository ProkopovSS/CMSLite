<?php
  //controller class - for model-view-controller project type

   class controller
   {
		public static $path_db_conf;
        public static $viewVars = array();
		public static $controller=NULL;
		public static $method=NULL;
		public static $tpl=NULL;


//Load template site
		public static function load_tpl($tpl=NULL)
		{
			if (!isset($tpl))
			{
				$tpl='default';
			}

			controller::$tpl=$tpl;
			require_once $_SERVER['DOCUMENT_ROOT']."/templates/".$tpl.".php";
		}

//initialization engine site
		public static function init()
		{
			$tpl_controller = controller::$tpl.'_controller';
			$tpl_method = controller::$tpl.'_method';

			$path_cms_conf=$_SERVER['DOCUMENT_ROOT']."/config/cms_config.php";
			if (file_exists($path_cms_conf))
		    {
		  	 include $path_cms_conf;
		    }
		   else
			{
				echo "ERROR: CONFIG NOT EXIST";
			}

			if(isset($_GET['controller']))
			{
			controller::$controller=$_GET['controller'];
			}
			else
			{
				controller::$controller=$$tpl_controller;
			}
			if(isset($_GET['method']))
			{
				controller::$method=$_GET['method'];
			}
			else
			{
			controller::$method=$$tpl_method;
			}

           if(isset($_GET['data']))
	         {
	          $data=$_GET['data'];
	         }
	          else 
	         {

	          $stack = array('data'=>$_POST);
	         
			  if(isset($_FILES) && !(empty($_FILES)))
			  {
			  
			  	$stack_tmp = array('file'=>$_FILES);
			    $stack['data']['file']=$stack_tmp['file'];
			  }
	          $data=$stack['data'];
	         }
	        
			controller::Get_metod_controller(controller::$controller,controller::$method, $data); 
		}

//Get controller site
		private static function Get_controller($controller_name)
			{
				require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/'.$controller_name.'.php';
			}
//Get view site
		private static function Get_view($controller_name,$method_name)
		{
			$data=controller::$viewVars;
			foreach ($data as $elemnt => $value)
			{
				foreach ($value as $key => $val)
				{
					$$key=$val;
				}
			}
			require_once $_SERVER['DOCUMENT_ROOT'].'/views/'.$controller_name.'/'.$method_name.'.php';
		}
//Get method site
		public static function  Get_metod_controller($controller_name, $method_name,$array_values=NULL)
	  		{
	  			if (!isset($controller_name))
				{
						$controller_name="main";
				}

				else
				{
					if(!isset($method_name))
				    {
						$method_name="index";
					}
				}

	  			controller::Get_controller($controller_name);
	 			$obj = new $controller_name();
	  			if(isset($array_values))
	   				{
						
	  					call_user_func_array(array($obj, $method_name),array($array_values));
	   				}
	  			else
	   				{
		  				call_user_func(array($obj, $method_name));
	   				}
				controller::Get_view($controller_name,$method_name);
	  		}

//Set variable for view
		public function set($one, $two = null)
		{
			$stack = array($one => $two);
			array_push(controller::$viewVars, $stack);
		}

// merge two arrays inner join
		public function joinArrayKey($arr1, $arr2, $arrKey, $prefix=null, $no_key=null)
		{
			$stack[]=array();
			array_pop($stack);

			foreach ($arr1 as $key1 => $value1)
			{
				 foreach ($arr2 as $key2 => $value2)
				 {
					if($value1[$arrKey['key1']]==$value2[$arrKey['key2']])
					{
						 if($prefix!=null)
						 {
						 	$prefixArr[]=array();
							array_pop($prefixArr);

						 	foreach ($value2 as $key3 => $value3)
						 	{
						 		$prefixArr+=array($prefix.$key3 => $value3);
						 	}

							$value2=$prefixArr;
						 }

						 if($no_key!=null && $no_key==true)
						 {
						 	unset($value1[$arrKey['key1']]);
							unset($value2[$prefix.$arrKey['key2']]);
						 }

						 $result=$value1+$value2;
						 array_push($stack,$result);
					}
				 }
			}
			return $stack;
		}

//debug array - print
		public function debug($array)
		{
			$deb = print_r($array, true);
	   		echo "<pre>".$deb."</pre>";
		}
//get component view
		public function HelperClass($helper,$method,$data)
		{
			controller::GetHelper($helper);

			$obj = new $helper();

	  			if($data!=NULL)
	   				{
	   					$param=array();
	   					array_push($param,$data);
	  					$result = call_user_func_array(array($obj, $method),$param);
						return $result;
	   				}
	  			else
	   				{
		  				call_user_func(array($obj, $method));
						return $result;
	   				}
		}

		private static function GetHelper($helpers_name)
		{
			require_once $_SERVER['DOCUMENT_ROOT'].'/helpers/'.$helpers_name.'.php';
		}
  }

?>