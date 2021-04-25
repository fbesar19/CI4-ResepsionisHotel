<?php

namespace App\Controllers;

use App\Models\kamarModel;

class Pemesanan extends BaseController
{
	public function __construct()
	{
		$this->kamarModel = new kamarModel();
	}

	public function index()
	{
		$data['kamar'] = $this->kamarModel->findAll();
		return view('pesan_kamar', $data);
	}
}
