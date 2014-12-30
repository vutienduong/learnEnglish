<?php
class LearnWordController extends Zend_Controller_Action{
	public function indexAction(){
		$wordModel = new Model_Word();
		$randWord = $wordModel->getRandomWord();
		$this->view->word = $randWord;
	}
}