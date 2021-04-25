<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\PembayaranModel;

class Laporan extends BaseController
{
	public function __construct()
	{
		$this->pemesananModel = new PemesananModel();
		$this->pembayaranModel = new PembayaranModel();
	}

	public function index()
	{
		$data['pemesanan'] = $this->pemesananModel->findAll();
		return view('bayar_kamar', $data);
	}

	public function laporan_bulanan()
	{
		$data['pemesanan'] = $this->pemesananModel->findAll();
		return view('laporan_bulanan', $data);
	}

	public function laporan_harian()
	{
		$data['pemesanan'] = $this->pemesananModel->findAll();
		return view('laporan_harian', $data);
	}

	public function print_laporan_harian()
	{
		$data['pemesanan'] = $this->pemesananModel->findAll();
		return view('print_laporan_harian', $data);
	}
}
