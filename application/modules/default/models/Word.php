<?php
class Model_Word {
	private $_wordDao;
	
	const START_INDEX_COND = 'start_index';
	const END_INDEX_COND = 'end_index';
	const GET_WORD_AT_MAX_INDEX_COND = 'get_word_at_max_index';
	
	public function __construct() {
		$this->_wordDao = new Model_DAO_WordDAO ();
	}
	protected function getWordDAO() {
		return $this->_wordDao;
	}
	
	public function getRandomWord() {
		$maxId = $this->getMaxCurrentId ();
		if ($maxId == null) {
			return null;
		}
		$randId = rand ( 0, $maxId );
		return $this->getWordNTh ( $randId );
	}
	protected function getMaxCurrentId() {
		return $this->getWordDAO ()->getMaxCurrentId ();
	}
	protected function getRandomNumber($limit) {
		return rand ( 0, $limit );
	}
	protected function getWordNTh($id) {
		if($id == null)
		{
			return null;
		}
		return $this->getWordDAO ()->getWordById ( $id );
	}
	public function addWord($data) {
		$wordBean = new Model_Bean_Word ( $data );
		return $this->getWordDAO ()->addWord ( $data );
	}
	
	public function addWordByArrayData($data) {
		return $this->getWordDAO ()->addWordByArrayData( $data );
	}
	public function updateWord($data) {
		$wordBean = new Model_Bean_Word ( $data );
		if ($wordBean->getId () == '') {
			return $this->getWordDAO ()->updateWord ( $word, "byEng" );
		}
		return $this->getWordDAO ()->updateWord ( $word, "byId" );
	}
	
	public function deleteOldRecentAddWordData()
	{
		$ctime = time();
		$dao = new Model_DAO_WordDAO();
		$nearestCTime = $dao->getNearestCTime();
		if(is_array($nearestCTime) && count($nearestCTime) > 0)
		{
			$nearestCTime = $nearestCTime[0];
			$nearestCTime = array_pop($nearestCTime);
			if($nearestCTime != null)
			{
				$nearestCTime = intval($nearestCTime);
			
				$distance = $ctime - $nearestCTime;
				if($distance > AddWordController::MAX_TIME_STORE_RECENT_WORD)
				{
					$dao->deleteAllNearestCTime();
					return true;
				}
			}
		}
		return false;
	}
	
	public function getTopRecentAddWord()
	{
		$dao = new Model_DAO_WordDAO();
		return $dao->getTopNearestAddWord();
	}
	
	//return Word Bean or null
	public function getWordById($id)
	{
		return $this->getWordDAO()->getWordById($id);
	}
	
	//return array Word beans or array()
	public function getWordIncludeString($str)
	{
		$result = $this->getWordDAO()->getWordIncludeString($str);
		if($result == null)
		{
			return array();
		}
		else return $result;
	}
}