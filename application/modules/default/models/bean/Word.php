<?php
/**
 * @author Duong
 *
 */
class Model_Bean_Word {
	const ID = '_id';
	const ENG = 'col_eng';
	const VIE = 'col_vie';
	const CREATE_TIME = 'col_create_time';
	const FAMILY_TYPE = 'col_family_type';
	const MEMO = 'col_memo';
	
	private $_id;
	private $_eng;
	private $_vie;
	private $_createTime;
	private $_familyType;
	private $_memo;
	
	public function __construct($data=null)
	{
		if($data == null)
		{
			$this->setId('');
			$this->setEng('');
			$this->setVie('');
			$this->setCreateTime('');
			$this->setFamilyType('');
			$this->setMemo('');
		}
		else
		{
			$this->setId( array_key_exists(self::ID, $data) ? $data[self::ID] : '' );
			$this->setEng( array_key_exists(self::ENG, $data) ? $data[self::ENG] : '' );
			$this->setVie( array_key_exists(self::VIE, $data) ? $data[self::VIE] : '' );
			$this->setCreateTime( array_key_exists(self::CREATE_TIME, $data) ? $data[self::CREATE_TIME] : '' );
			$this->setFamilyType( array_key_exists(self::FAMILY_TYPE, $data) ? $data[self::FAMILY_TYPE] : '' );
			$this->setMemo( array_key_exists(self::MEMO, $data) ? $data[self::MEMO] : '' );
		}
	}
	
	public function convertToArray()
	{
		$result = array();
		$result[self::ID] = $this->getId();
		$result[self::END] = $this->getEng();
		$result[self::VIE] = $this->getVie();
		$result[self::CREATE_TIME] = $this->getCreateTime();
		$result[self::FAMILY_TYPE] = $this->getFamilyType();
		$result[self::MEMO] = $this->getMemo();
		return $result;
	}
	
	// get/set id
	public function getId()
	{
		return $this->_id;
	}
	public function setId($value)
	{
		$this->_id = $value;
	}
	
	//get/set eng
	public function getEng()
	{
		return $this->_eng;
	}
	public function setEng($value)
	{
		$this->_eng = $value;
	}
	
	//get/set vie
	public function getVie()
	{
		return $this->_vie;
	}
	public function setVie($value)
	{
		$this->_vie = $value;
	}
	
	//get/set family_type
	public function getFamilyType()
	{
		return $this->_familyType;
	}
	public function setFamilyType($value)
	{
		$this->_familyType = $value;
	}
	
	//get/set family_type
	public function getMemo()
	{
		return $this->_memo;
	}
	public function setMemo($value)
	{
		$this->_memo = $value;
	}
	
	//get/set family_type
	public function getCreateTime()
	{
		return $this->_createTime;
	}
	public function setCreateTime($value)
	{
		$this->_createTime = $value;
	}
	
}