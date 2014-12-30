<?php
class AjaxRequestController extends Zend_Controller_Action{
	public function storetodbAction()
	{
		$this->_helper->viewRenderer->setNoRender(true);
		if($_SERVER['REQUEST_METHOD'] == 'POST' && is_array($_POST))
		{
			if(! isset($_POST['eng']))
				return;
			if($_POST['eng']== '')
				return;
			$vie = isset($_POST['vie'])?$_POST['vie']: '';
				
			//check existed
			$dao = new Model_DAO_WordDAO();
			if($dao->getWordByPair($_POST['eng'], $vie) != null)
			{
				echo json_encode(array('err'=> AddWordController::ERR_PAIR_WORD_EXISTED));
				return;
			}
				
			//insert
			$type = is_array($_POST['type'])?  $_POST['type'] : array();
			$dataArr = array(Model_Bean_Word::ENG => $_POST['eng'],
					Model_Bean_Word::VIE => $_POST['vie'],
					Model_Bean_Word::FAMILY_TYPE => implode(',', $type),
					Model_Bean_Word::CREATE_TIME => time(),
			);
			$bean = new Model_Bean_Word($dataArr);
			$id = $dao->addWord($bean);
			echo json_encode(array('success'=>$id));
		}
	}
}