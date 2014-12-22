<?php
class Application_Form_Login extends Application_Form_Abstract {
	public function init() {
		parent::init ();
		$this->setName ( "loginForm" );
		$username = new Zend_Form_Element_Text ( 'username' );
		$username->setLabel ( 'Username' )->setRequired ( true );
		
		$password = new Zend_Form_Element_Password ( 'password' );
		$password->setLabel ( 'Password' )->setRequired ( true );
		
		$submitBtn = new Zend_Form_Element_Submit ('submit');
		$submitBtn->setAttrib ( 'id', 'submitBtn' )->setLabel ( 'Submit' );
		
		$this->addElement ( array (
				$username,
				$password,
				$submitBtn 
		) );
	}
}