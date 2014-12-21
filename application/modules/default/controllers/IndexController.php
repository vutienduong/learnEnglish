<?php
class IndexController extends Zend_Controller_Action{
	public function indexAction(){
		$baseurl=$this->_request->getbaseurl();
		$this->view->headLink()->appendStylesheet($baseurl."/public/dist/css/bootstrap.css");
 		$this->view->headscript()->appendFile($baseurl."/public/js/jquery-1.11.0.min.js","text/javascript");
 		$this->view->headscript()->offsetSetFile("2",$baseurl."/public/dist/js/bootstrap.min.js","text/javascrip");
 		$this->view->headscript()->appendFile($baseurl."/public/js/index1.js","text/javascrip");

		if($_COOKIE && $_COOKIE['login'])
		{
			
		}
		else
		{
			$this->render('login');
		}
 	}

 	public function loginAction()
 	{
 		
 		if($_SERVER['REQUEST_METHOD'] = 'POST' && $_POST)
 		{	
 			//var_dump($_POST);
 			if(! array_key_exists('username', $_POST))
 				return;
 			$username = $_POST['username'];

 			if(! array_key_exists('pwd', $_POST))
 				return;
 			$password = $_POST['pwd'];
 			$muser = new Model_User;

 			$checkData = $muser->getLoginUserInfo($username);
        	if( count ($checkData) == 0 ) 
        	{
        		$this->view->falseInfo = "Wrong username or password, please try again";
        		$this->render('login');
        	}
        	echo "if account not exist";

        	var_dump($checkData);
        	if( $checkData['password'] != $password )
        	{
        		$this->view->falseInfo = "Wrong username or password, please try again";
        		$this->render('login');	
        	}
        	echo "if pass wrong";

        	$cookie_name = "login";
			$cookie_value = $username;
        	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        	$this->render('index');	       	
        	echo "true info";
 		}

 	}

	public function logoutAction()
 	{

 	} 	

	public function init(){
    	$this->view->headTitle("QHOnline - Zend Layout");
	}	
}