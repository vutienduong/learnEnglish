<?php
class AddWordController extends Zend_Controller_Action {
	const URL_ADD_INDEX = "add_index";
	const URL_UPLOAD_FILE = "upload_file";
	const URL_MORE = "more";
	const ERR_PAIR_WORD_EXISTED = 'existed_word';
	const ARR_FAMILY_TYPE = "----,noun,verb,conj,adj,adv,prep,phrase";
	const MAX_TIME_STORE_RECENT_WORD = 7200;
	
	
	public function init() {
		$navs = array (
				array (
						'display' => 'Add By Hand',
						'controller' => 'addWord',
						'action' => 'index' 
				),
				array (
						'display' => 'Add By File',
						'controller' => 'addWord',
						'action' => 'uploadfile' 
				),
				array (
						'display' => 'More',
						'controller' => 'addWord',
						'action' => 'more' 
				) 
		);
		$this->view->navs = $navs;
	}
	public function indexAction() {
		$select = "<select class='form-control' id='family_type' name='family_type' multiple='true' >";
		$options = "";
		$array_family_type = split ( ",", self::ARR_FAMILY_TYPE );
		$first = true;
		foreach ( $array_family_type as $type ) {
			$selected = "";
			if ($first) {
				$selected = "selected='selected'";
				$first = false;
			}
			$options .= "<option value='" . $type . "'" . $selected . ">" . $type . "</option>";
		}
		$this->view->select_html = $select . $options . "</select>";
		$this->view->url = self::URL_ADD_INDEX;
		
		//check recent word
		$wordLogic = new Model_Word();
		$deleted = $wordLogic->deleteOldRecentAddWordData();
		if(!$deleted)
		{
			$recentAddWordList = $wordLogic->getTopRecentAddWord();
			//array() or array(...)
			if($recentAddWordList != null)
			{
				$this->view->recentAddWordList = $recentAddWordList;
			}
		}
	}
	public function uploadfileAction() {
		$this->view->url = self::URL_UPLOAD_FILE;
		$this->render ( "index" );
	}
	public function moreAction() {
		$this->view->url = self::URL_MORE;
		$this->render ( "index" );
	}
	public function storetodbAction() {
		// $this->_forward('storeToDB', 'AjaxRequest', null, array());
		$request = $this->getRequest ()->getPost ();
		$this->_helper->viewRenderer->setNoRender ();
		$this->_helper->getHelper ( 'layout' )->disableLayout ();
		
		if (! isset ( $request ['eng'] ))
			return;
		if ($request ['eng'] == '')
			return;
		$vie = isset ( $request ['vie'] ) ? $request ['vie'] : '';
		$type = is_array ( $request ['type'] ) ? $request ['type'] : array ();
		$dao = new Model_DAO_WordDAO ();
		$ctime = time ();
		
		//check recent word
		$wordLogic = new Model_Word();
		$wordLogic->deleteOldRecentAddWordData();
			
		// check existed
		if ($dao->getWordByPair ( $request ['eng'], $vie ) != null) {
			echo json_encode ( array (
					'err' => self::ERR_PAIR_WORD_EXISTED 
			) );
			return;
		}
		// insert
		$dataArr = array (
				Model_Bean_Word::ENG => $request ['eng'],
				Model_Bean_Word::VIE => $vie,
				Model_Bean_Word::FAMILY_TYPE => implode ( ',', $type ),
				Model_Bean_Word::CREATE_TIME => $ctime 
		);
		$bean = new Model_Bean_Word ( $dataArr );
		$id = $dao->addWord ( $bean );
		$idInt = intval($id);
		
		$data = array('col_ctime'=>$ctime, 'col_word'=>$idInt);
		$dao->addNearestCTime($data);
		
		echo json_encode ( array (
				'success' => $id 
		) );
	}
}