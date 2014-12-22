<?php
class Default_Form_Login extends Default_Form_Abstract {
	public function init() {
		parent::init ();
		$this->setName ( "loginForm" );
		
		$username = new Form_Element_Text('username');
		$username->setLabel('Username')->setRequired(true);
		$username->setAttrib('id', 'username');
		
		$password = new Form_Element_Password('password');
		$password->setLabel('Password')->setRequired(true);
		$password->setAttrib('id', 'password');
		
		$submitBtn = new Form_Element_Submit('submit');
		$submitBtn->setLabel('Submit')->setRequired(true);
		$submitBtn->setAttrib('id', 'submitBtn');
	
		
		$this->addElements ( array (
				$username,
				$password,
				$submitBtn,
		) );
	}
}