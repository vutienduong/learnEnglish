<?php
class TestController extends Zend_Controller_Action{
	public function indexAction(){
		$dao = new Model_DAO_WordDAO();
		$eng = 'cat';
		$vie = 'con cho';
		//$rs = $dao->getWordIncludeString('Chirstmas');
		$str = "fjkds 134";
		var_dump(split('aaa', $str));
	}
}