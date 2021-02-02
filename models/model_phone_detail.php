<?php


class Model_Phone_Detail extends Model_Base
{
	public function getPhone($phoneID)
	{
		$phoneID = (int)$phoneID;
		$sql = "SELECT * FROM $this->table WHERE id = $phoneID";
		$this->_getResult($sql);
		return $this->dataResult;
	}

	public function deletePhone($args)
	{
		$sql = "DELETE FROM $this->table WHERE id = $args";
		$this->deleteBy($sql);
		return $this->dataResult;
	}
}