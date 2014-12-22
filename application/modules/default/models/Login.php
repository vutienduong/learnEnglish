<?php
class Model_Login
{
	public function authenticate($usn, $pwd)
	{
		$table = new Zend_Db_Table('user');
		$select =$table->select();
		$select->where("username=?", $usn)->where("password=?",$pwd);
		$row = $table->fetchAll($select)->toArray();
		if(is_array($row) && count($row) > 0)
			return true;
		else return false;
	}
}