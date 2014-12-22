<?php
class Application_Form_Element_Text extends Zend_Form_Element_Text
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
					array( array( 'data' => 'HtmlTag') , array('tag' => 'div','class' => 'controls')),
					array('Label', array('class' => 'required control-label')),
					array(array('elementDiv' => 'HtmlTag'), array('tag' => 'div', 'class' => 'control-group')),
			));
			$this->setAttrib('class',  'form-control');
		}
	}
}