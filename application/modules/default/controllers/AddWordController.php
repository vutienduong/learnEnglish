<?php
class AddWordController extends Zend_Controller_Action{
	const URL_ADD_INDEX = "add_index";
	const URL_UPLOAD_FILE = "upload_file";
	const URL_MORE = "more";
	
	const ARR_FAMILY_TYPE = "----,noun,verb,conj,adj,adv,prep,phrase";
	public function init(){
		$navs = array(
				array('display' => 'Add By Hand', 'controller' => 'addWord', 'action' => 'index' ),
				array('display' => 'Add By File', 'controller' => 'addWord', 'action' => 'uploadfile' ),
				array('display' => 'More', 'controller' => 'addWord', 'action' => 'more' ),
		);
		$this->view->navs = $navs;
	}
	
	public function indexAction(){
		$select = "<select class='form-control' id='family_type' name='family_type' multiple='true' >";
		$options = "";
		$array_family_type = split(",", self::ARR_FAMILY_TYPE);
		$first = true;
		foreach ($array_family_type as $type)
		{
			$selected = "";
			if($first)
			{
				$selected = "selected='selected'";
				$first = false;
			}
			$options .= "<option value='". $type ."'" . $selected . ">". $type ."</option>";
		}
		$this->view->select_html= $select . $options . "</select>"; 
		$this->view->url = self::URL_ADD_INDEX;
	}
	public function uploadfileAction()
	{
		$this->view->url = self::URL_UPLOAD_FILE;
		$this->render("index");
	}
	
	public function moreAction()
	{
		$this->view->url = self::URL_MORE;
		$this->render("index");
	}
	
	public function storetodbAction()
	{
		echo "Hello word";
		if($_SERVER['REQUEST_METHOD'] == 'POST' && is_array($_POST))
		{
			var_dump($_POST); die();
		}
	}
}