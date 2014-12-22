<?php
class Form_Element_Submit extends Zend_Form_Element_Submit
{
	public function loadDefaultDecorators()
	{
		if($this->loadDefaultDecoratorsIsDisabled())
		{
			return;
		}
		$decorators = $this->getDecorators();
		if(empty($decorators))
		{
			$this->setDecorators(array(
					'ViewHelper',
					'Description',
					'Errors',
			));
			$this->setAttrib('class',  'btn btn-primary');
		}
	}
} 
?>