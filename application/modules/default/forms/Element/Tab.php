<?php
class Form_Element_Tab extends Zend_Form_Element
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
			
		}
	}
}
?>