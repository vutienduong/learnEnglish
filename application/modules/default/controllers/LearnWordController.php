<?php
class LearnWordController extends Zend_Controller_Action{
	public function indexAction(){
		$wordModel = new Model_Word();
		
		$randWord = null;
		for($i = 0; $i < 3; $i ++)
		{
			$randWord = $wordModel->getRandomWord();
			if ($randWord != null)
				break;	
		}
		
		if($randWord == null)
		{
			$randWord = $wordModel->getRandomWord(array(Model_Word::GET_WORD_AT_MAX_INDEX_COND => true));
		}

		$this->view->word = $randWord;

		
	}
}