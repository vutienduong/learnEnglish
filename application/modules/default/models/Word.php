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
	public function getRandomWord($condition = null) {
		if ($condition == null) {
			return $this->getRandomWordByIndex ();
		}
			
		if (is_array ( $condition )) {
			if (array_key_exists ( self::START_INDEX_COND, $condition )) 
			{
				if (array_key_exists ( self::END_INDEX_COND, $condition )) {
					return $this->getRandomWordByIndex ( $condition [self::START_INDEX_COND], $condition [self::END_INDEX_COND] );
				} else {
					return $this->getRandomWordByIndex ( $condition [self::START_INDEX_COND] );
				}
			}
			else if (array_key_exists ( self::GET_WORD_AT_MAX_INDEX_COND, $condition )) 
			{
				$maxId = $this->getMaxCurrentId ();
				return $this->getWordNTh ( $maxId );
			}
		}
		
		return null;
	}
	protected function getRandomWordByIndex($start = null, $end = null) {
		if ($start == null) {
			$start = 1;
		}
		
		if ($end == null) {
			$maxId = $this->getMaxCurrentId ();
			if ($maxId == null) {
				return null;
			}
		} else {
			$maxId = $end;
		}
		$randId = $this->getRandomNumber ( $start, $maxId );
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
	public function updateWord($data) {
		$wordBean = new Model_Bean_Word ( $data );
		if ($wordBean->getId () == '') {
			return $this->getWordDAO ()->updateWord ( $word, "byEng" );
		}
		return $this->getWordDAO ()->updateWord ( $word, "byId" );
	}
}