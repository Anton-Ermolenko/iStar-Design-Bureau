<?php


class Model_Add_Edit extends Model_Base
{
	public function fieldsTable()
	{
		return array(

			'id' => 'Id',
			'name' => 'name',
			'surname' => 'surname',
			'email' => 'email',
			'dob' => 'dob',
			'phone' => 'phone',
		);
	}

	public function addPhone($args)
	{
		$fields = [];
		if ($args) {
			foreach ($args as $key => $value) {
				$fields [$key] = "'" . $value . "'";
			}
		}
		$this->set($this->table, $fields);
	}

	public function editPhone($id, $param)
	{
		$fields = [];
		if ($param) {
			foreach ($param as $key => $value) {
				$fields [$key] = "'" . $value . "'";
			}
		}
		$this->update($this->table, $id, $fields);
	}
}