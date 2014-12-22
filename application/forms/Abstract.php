<?php
class Application_Form_Abstract extends Zend_Form
{
	public function init()
	{
		$this->setAttribs(array('class' => 'form-horizontal'));
	}
}