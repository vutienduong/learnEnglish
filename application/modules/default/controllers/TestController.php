<?php
class TestController extends Zend_Controller_Action{
	public function indexAction(){
		$word = new Model_Word();
		var_dump($word->getWordNTh(1));
		echo $word->getRandomNumber(12);
		die();
	}
}