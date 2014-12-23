<?php
class Model_DAO_WordDAO
{
	const DICTIONARY_TABLE = 'dictionary';
	const ACCOUNT_TABLE = 'user';
	
	public function addWord(Model_Bean_Word $word)
	{
		$dataArray = $word->convertToArray();
		unset($dataArray["_id"]);
		$table = new Zend_Db_Table('dictionary');
		$table->insert($dataArray);
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
}