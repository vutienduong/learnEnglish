<?php
class LoginController extends Zend_Controller_Action{
	public function indexAction(){
 		$form = new Default_Form_Login();
 		//$form->submitBtn->setLabel('login');
 		$this->view->form = $form;
 		if($this->getRequest()->isPost())
 		{
 			$formData = $this->getRequest()->getPost();
 			if($form->isValid($formData))
 			{
 				$username = $form->getValue('username');
 				$password = $form->getValue('password');
 				$loginUser = new Model_Login();
 				if($loginUser->authenticate($username, $password))
 				{
 					setcookie('login', $username, time() + 3600, "/");
 					$this->_redirect('/index');
 				}
 				else 
 				{
 					$form->populate($formData);
 				}
 			}
 			else
 			{
 				$form->populate($formData);
 			}
 		}
 	}
 	
 	public function loginAction(){
 	}

	public function init(){
    	$this->view->headTitle("QHOnline - Zend Layout");
	}	
}