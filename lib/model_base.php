<?php


Abstract Class Model_Base
{
	public function __construct($tableName) {

		global $dbObject;
		$this->db = $dbObject;


		$this->table = $tableName;


	}

	protected function _getResult($sql){
		try{
			$db = $this->db;
			$stmt = $db->query($sql);
			$rows = $stmt->fetchAll();
			$this->dataResult = $rows;
		}catch(PDOException $e) {
			echo $e->getMessage();
			exit;
		}

		return $rows;
	}

	public function deleteBy($sql){
		try {
			$db = $this->db;
			$result = $db->exec($sql);
		}catch(PDOException $e){
			echo 'Error : '.$e->getMessage();
			echo '<br/>Error sql :  '. $sql ;
			exit();
		}
		return $result;
	}

	public function set($table, $arraySetFields) {
		$arrayAllFields = array_keys($this->fieldsTable());
		$arrayData = array();
		foreach($arrayAllFields as $field){
			if (isset($arraySetFields[$field]) && $arraySetFields[$field] != "''"){
				$arrayData[] = $arraySetFields[$field];
			} else {
				$arrayData[] = 'NULL';
			}
		}
		$forQueryFields =  implode(', ', $arrayAllFields);
		$forQueryPlace = implode(', ', $arrayData);

		try {
			$db = $this->db;
			$stmt = $db->prepare("INSERT INTO $table ($forQueryFields) values ($forQueryPlace)");
			$result = $stmt->execute($arrayData);
		}catch(PDOException $e){
			echo 'Error : '.$e->getMessage();
			echo '<br/>Error sql : ' . "'INSERT INTO $table ($forQueryFields) values ($forQueryPlace)'";
			exit();
		}

		return $result;
	}

	public function update($table, $id, $arraySetFields){
		$arrayAllFields = array_keys($this->fieldsTable());
		$arrayData = array();
		foreach($arrayAllFields as $field){
			if($field == 'id'){
				continue;
			}
			if (isset($arraySetFields[$field]) && $arraySetFields[$field] != "''"){
				$arrayData[] = $field . " = " . $arraySetFields[$field];
			} else {
				$arrayData[] = $field . " = NULL";
			}
		}


		$strForSet = str_replace('"', '', implode(', ', $arrayData));

		try {
			$db = $this->db;
			$stmt = $db->prepare("UPDATE $table SET $strForSet WHERE `id` = $id");
			$result = $stmt->execute();
		}catch(PDOException $e){
			echo 'Error : '.$e->getMessage();
			echo '<br/>Error sql : ' . "'UPDATE $this->table SET $strForSet WHERE `id` = $id'";
			exit();
		}
		return $result;
	}


}