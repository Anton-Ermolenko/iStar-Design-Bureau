<?php


class Controller_All_Phones extends Controller_Base
{

	public $layouts = "index";


	function index($args)
	{

		if (isset($args['query'])) {
			$phones = $this->search($args['query']);
		} else {
			$model = new Model_All_Phones('phone_book');
			$phones = $model->getPhonesList();
		}

		$this->template->vars('result', $phones);
		$this->template->view('index');
	}

	private function search($query)
	{
		$query = trim($query);

		$model = new Model_All_Phones('phone_book');
		$result = $model->search($query);
		return $result;
	}

}