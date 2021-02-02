<?php


class Model_All_Phones extends Model_Base
{
	public function getPhonesList()
	{
		$sql = "SELECT * FROM $this->table";
		$this->_getResult($sql);
		return $this->dataResult;
	}


	public function search($query)
	{
		$sql = "SELECT name, surname, phone
                  FROM $this->table WHERE name LIKE '%$query%'
                  OR surname LIKE '%$query%' OR phone LIKE '%$query%'";
		$this->_getResult($sql);
		return $this->dataResult;
	}

}