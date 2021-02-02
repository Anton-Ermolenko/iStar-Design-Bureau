<?php


class Controller_Phone_Detail extends Controller_Base
{
	public $layouts = "index";


	function index($args)
	{
		if (isset($args['delete'])) {
			$this->deletePhone($args['delete']);
		}
		$model = new Model_Phone_Detail('phone_book');
		$phone = $model->getPhone($args);
		$this->template->vars('result', $phone);
		$this->template->view('index');
	}

	private function deletePhone($args)
	{
		$model = new Model_Phone_Detail('phone_book');
		$id = str_replace('delete_', '', $args);
		$model->deletePhone($id);
		$this->template->reload('');
	}
}