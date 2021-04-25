<?php

namespace App\Controllers;

use App\Models\kamarModel;

class Kamar extends BaseController
{
	public function __construct()
	{
		$this->kamarModel = new kamarModel();
	}

	public function index()
	{
		$data['kamar'] = $this->kamarModel->findAll();
		return view('list_kamar', $data);
	}

	public function save_kamar()
	{
		$validation =  \Config\Services::validation();
		if (!$this->validate(
			[
				'nama_kamar' => 'required',
				'stok_kamar' => 'required|numeric',
				'harga_sewa' => 'required|numeric',
				'maksimal_penghuni' => 'required|numeric'
			],
			[   // Errors
				'nama_kamar' => [
					'required' => 'Nama kamar tidak boleh kosong'
				],
				'stok_kamar' => [
					'required' => 'Stok kamar tidak boleh kosong',
					'numeric' => 'Stok kamar harus angka',
				],
				'harga_sewa' => [
					'required' => 'Harga sewa tidak boleh kosong',
					'numeric' => 'Harga sewa harus angka',
				],
				'maksimal_penghuni' => [
					'required' => 'Maksimal penghuni tidak boleh kosong',
					'numeric' => 'Maksimal penghuni harus angka',
				]
			]
		)) {

			session()->setFlashdata('pesan', 'data harus sesuai. angka diisi angka dan data tidak boleh kosong');
			return redirect()->to(base_url('kamar'));
		}
		$gambar = $this->request->getFile('gambar');
		$gambar->move('foto_kamar');
		$filegambar = $gambar->getName();

		$this->kamarModel->save([
			'nama_kamar' => $this->request->getVar('nama_kamar'),
			'jenis_kamar' => $this->request->getVar('jenis_kamar'),
			'stok_kamar' => $this->request->getVar('stok_kamar'),
			'harga_sewa' => $this->request->getVar('harga_sewa'),
			'maksimal_penghuni' => $this->request->getVar('maksimal_penghuni'),
			'gambar' => $filegambar
		]);

		session()->setFlashdata('berhasil', 'Berhasil Menambahkan Artikel');
		return redirect()->to(base_url('kamar'));
	}

	public function delete_kamar($id)
	{
		$this->kamarModel->delete($id);
		return redirect()->to(base_url('kamar'));
	}
}
