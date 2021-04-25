<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Login extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->pegawaiModel = new PegawaiModel();
	}

	public function index()
	{
		return view('login');
	}

	public function cek_login()
	{
		$nik = $this->request->getPost('nik');
		$password = $this->request->getPost('password');

		$cek = $this->pegawaiModel->cek_login($nik, $password);

		if (isset($cek['nik']) && isset($cek['password'])) {
			session()->set('nama', $cek['nama_pegawai']);
			return redirect()->to(base_url('home'));
		} else {
			session()->setFlashdata('warning', 'Username atau password salah');
			return redirect()->to(base_url('login'));
		}
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to(base_url());
	}
}
