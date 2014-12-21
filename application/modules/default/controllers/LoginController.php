<?php
class LoginController extends Zend_Controller_Action{
	public function indexAction(){
 		$muser = new Model_User;
        echo "<pre>";
        print_r($muser->listall());
        echo "</pre>";
 	}
 	
 	public function loginAction(){
 	}

	public function init(){
    	$this->view->headTitle("QHOnline - Zend Layout");
	}	
}