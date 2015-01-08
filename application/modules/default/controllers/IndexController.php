<?php
class IndexController extends Zend_Controller_Action{
	public function indexAction(){
		if(!$_COOKIE || !$_COOKIE['login'])
		{
			$this->_redirect('login');
		}
		$form = new Zend_Form('delete_cookie_form');
		$form->setAction('index/deleteCookie');
		$form->setMethod('post');
		$button = new Zend_Form_Element_Submit('delete_cookie_btn');
		$form->addElement($button);
		$this->view->deleteCookieForm = $form;
		$navs = array(
				array("display"=>"Hoc tu","controller"=>"learnWord", "action"=>"index"),
				array("display"=>"Them tu","controller"=>"addWord", "action"=>"index"),
				array("display"=>"Kiem tra","controller"=>"exam", "action"=>"index"),
				array("display"=>"like","controller"=>"like", "action"=>"index"),
				array("display"=>"Tra từ","controller"=>"searchWord", "action"=>"index"),	
		);
		$this->view->navs = $navs;
 	}

 	public function deletecookieAction()
 	{
 		if($this->getRequest()->isPost())
 		{
 			$formData = $this->getRequest()->getPost();
 			if($_COOKIE && $_COOKIE['login'])
 			{
 				setcookie('login', '' , time() - 3600, "/");
 			}
 		}
 		$this->_redirect('/index');
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
        		$this->_redirect('/index');
                return;
        	}

        	$checkData = $checkData[0];
        	if( $checkData['password'] != $password )
        	{
        		$this->view->falseInfo = "Wrong username or password, please try again";
        		$this->_redirect('/index');
                return;	
        	}

        	$cookie_name = "login";
			$cookie_value = $username;
        	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        	$this->_redirect('/index');	       	
        	return;
 		}

 	}

	public function logoutAction()
 	{

 	} 	

	public function init(){
    	$this->view->headTitle("QHOnline - Zend Layout");
    	$baseurl=$this->_request->getbaseurl();
    	$this->view->headLink()->appendStylesheet($baseurl."/public/dist/css/bootstrap.css");
    	$this->view->headscript()->appendFile($baseurl."/public/js/jquery-1.11.0.min.js","text/javascript");
    	$this->view->headscript()->offsetSetFile("2",$baseurl."/public/dist/js/bootstrap.min.js","text/javascrip");
    	$this->view->headscript()->appendFile($baseurl."/public/js/index1.js","text/javascrip");
	}	
}