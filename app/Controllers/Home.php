<?php

namespace App\Controllers;

use App\Models\kamarModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->kamarModel = new kamarModel();
	}

	public function index()
	{
		return view('dashboard');
	}
}
