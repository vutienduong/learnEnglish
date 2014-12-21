<?php
class Admin_IndexController extends Zend_Controller_Action{
	public function indexAction(){
		$this->view->hello = "Hello, this is variable pass from indexController";
		$tempArr = array("1"=>"Duong",
							"2"=>"Sinh",
							"3"=>"Diep");
		$this->view->listGoKorea = $tempArr;
	}	
	public function notNeededRenderAction(){
		$this->getHelper('viewRenderer')->setNoRender();  
	}
}