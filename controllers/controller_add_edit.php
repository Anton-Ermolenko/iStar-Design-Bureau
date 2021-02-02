<?php


class Controller_Add_Edit extends Controller_Base
{
	public $layouts = "index";


	function index($args)
	{

		if (isset($args)) {
			if (isset($args['edit'])) {
				$model = new Model_Phone_Detail('phone_book');
				$phone = $model->getPhone($args['edit']);
				$this->template->vars('result', $phone);
			} elseif (isset($args['id']) && $args['id'] > 0) {
				$this->editPhone($args);
			} else {
				$this->addPhone($args);
			}
		}


		$this->template->view('index');
	}

	private function addPhone($args)
	{
		$model = new Model_Add_Edit('phone_book');
		$param = [];
		$param['id'] = "";
		$param['name'] = $args['name'];
		$param['surname'] = $args['surname'];
		$param['email'] = $args['email'];
		$param['dob'] = $args['dob'];

		$i = 0;
		while ($args['phone' . $i]) {
			$param['phone'] .= $args['phone' . $i] . ', ';
			$i++;
		}
		$model->addPhone($param);
		$this->template->reload('');
	}

	private function editPhone($args)
	{
		$model = new Model_Add_Edit('phone_book');
		$param = [];
		$param['name'] = $args['name'];
		$param['surname'] = $args['surname'];
		$param['email'] = $args['email'];
		$param['dob'] = $args['dob'];

		$i = 0;
		while ($args['phone' . $i]) {
			$param['phone'] .= $args['phone' . $i] . ', ';
			$i++;
		}

		$model->editPhone((int)$args['id'], $param);
		$this->template->reload('');
	}
}