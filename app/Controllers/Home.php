<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data['title'] = "AdminLTE 3 | Register";
		$data['breadcrumb_title'] = "Breadcrumb Title";
		$data['breadcrumb']  =  array(
			array(
				'title' => 'Home',
				'link' => 'dashboard'
			),
			array(
				'title' => 'Breadcrumb Title1',
				'link' => null
			)
		);
    	return view('auth/login', $data);
	}
}