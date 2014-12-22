<?php
class Default_Form_Abstract extends Zend_Form
{
	public function init()
	{
		$this->setAttribs(array('class' => 'form-horizontal'));
	}
}