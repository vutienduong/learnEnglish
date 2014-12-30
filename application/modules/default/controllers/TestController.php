<?php
class TestController extends Zend_Controller_Action{
	public function indexAction(){
		$dao = new Model_DAO_WordDAO();
		$eng = 'cat';
		$vie = 'con cho';
		$dao->getWordByPair($eng, $vie);
	}
}