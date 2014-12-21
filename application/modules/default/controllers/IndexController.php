<?php
class IndexController extends Zend_Controller_Action{
	public function indexAction(){
		$baseurl=$this->_request->getbaseurl();
		$this->view->headLink()->appendStylesheet($baseurl."/public/dist/css/bootstrap.css");
 		$this->view->headscript()->appendFile($baseurl."/public/js/jquery-1.11.0.min.js","text/javascript");
 		$this->view->headscript()->offsetSetFile("2",$baseurl."/public/dist/js/bootstrap.min.js","text/javascrip");
 		$this->view->headscript()->appendFile($baseurl."/public/js/index1.js","text/javascrip");

		if($_COOKIE['login'])
		{
			$loginController = new LoginController();
			$loginController->indexAction();	
		}
		else
		{
			$first_name = 'David';
			setcookie('login', $first_name, time() + (86400 * 7));
		}
 	}

	public function init(){
    	$this->view->headTitle("QHOnline - Zend Layout");
	}	
}