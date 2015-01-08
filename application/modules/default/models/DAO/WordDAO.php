<?php
class Model_DAO_WordDAO
{
	const DICTIONARY_TABLE = 'dictionary';
	const ACCOUNT_TABLE = 'user';
	const MAX_LIMIT_DISPLAY_RECENT_WORD = 10;
	
	protected $db;
	
	public function __construct(){
		$this->db=Zend_Registry::get('db');
	}
	
	public function addWord(Model_Bean_Word $word)
	{
		$dataArray = $word->convertToArray();
		unset($dataArray["_id"]);
		$table = new Zend_Db_Table('dictionary');
		return $table->insert($dataArray);
	}
	
	public function addWordByArrayData($dataArray)
	{
		$table = new Zend_Db_Table('dictionary');
		return $table->insert($dataArray);
	}
	
	public function getWordByPair( $eng, $vie )
	{
		
		$table = new Zend_Db_Table('dictionary');
		$select = $table->select()->where('col_eng = ?', $eng)->where('col_vie = ? ', $vie);
		$result = $table->fetchRow($select);
		if($result == null) return null;
		return $result->toArray();
	}
	
	public function updateWord(Model_Bean_Word $word, $byCondition)
	{
		$dataArray = $word->convertToArray();
		$table = new Zend_Db_Table('dictionary');
		
		//default : update by Id
		$where = $table->getAdapter()->quoteInto("_id = ? ", $dataArray["_id"]);
		
		if($byCondition == "byEng") {
			$where = $table->getAdapter()->quoteInto("col_eng = ? ", $dataArray["col_eng"]);
			unset($dataArray['_id']);
		}
		
		$table->update($dataArray, $where);
	}
	
	public function getMaxCurrentId()
	{
		$table = new Zend_Db_Table('dictionary');
		$select = $table->select()->from('dictionary', array(new Zend_Db_Expr('max(_id) as maxId')));
		$result = $table->fetchRow($select)->toArray();
		if( is_array($result) && array_key_exists('maxId', $result) )
			return $result['maxId'];
		return null;
	}
	
	public function getWordById($id)
	{
		$table = new Zend_Db_Table('dictionary');
		$select = $table->select()->where('_id=?', $id);
		$result = $table->fetchRow($select);
		if($result == null)
			return null;
		return $result->toArray();
	}
	
	public function getNearestCTime()
	{
		$sql=$this->db->query("select max(col_ctime) from recent_add_word;");
		return $sql->fetchAll();
	}
	
	public function addNearestCTime($data)
	{
		$table = new Zend_Db_Table('recent_add_word');
		return $table->insert($data);
	}
	
	public function deleteAllNearestCTime()
	{
		
		$sql=$this->db->query("delete from recent_add_word;");
		return $sql->fetchAll();
	}
	
	public function getTopNearestAddWord()
	{
		$limit = self::MAX_LIMIT_DISPLAY_RECENT_WORD;
		$query ="SELECT a._id, a.col_eng FROM dictionary as a JOIN recent_add_word as b on a._id = b.col_word limit ".$limit;
		$sql=$this->db->query($query);
		return $sql->fetchAll();
	}
	
	public function getWordIncludeString($str)
	{
		$table = new Zend_Db_Table('dictionary');
		$select = $table->select()->where("col_eng LIKE '%{$str}%'" );
		$result = $table->fetchAll($select);
		if($result == null)
			return null;
		return $result->toArray();
	}
}