<?php
class SearchWordController extends Zend_Controller_Action{
	public function indexAction(){
		if ($this->getRequest()->isPost())
		{
			$data = $this->getRequest()->getPost();
			$keyword = array_key_exists('keyword', $data) ? $data['keyword'] : '';
			if($keyword == '')
			{
				$this->view->error = 'Please type at least a character !';
			}
			else if(is_numeric($keyword))
			{
				$wordLogic = new Model_Word();
				$result = $wordLogic->getWordById($keyword);
				$this->view->result = $result != null ? array($result) : array();
			}else
			{
				$wordLogic = new Model_Word();
				$this->view->result = $wordLogic->getWordIncludeString($keyword);
			}
		}
	}
	public function searchAction(){
		if ($this->getRequest()->isPost())
		{
			$data = $this->getRequest()->getPost();
			var_dump($data); die();
		}
		else
		{
			//var_dump("test"); die();
		}
	}
	
}