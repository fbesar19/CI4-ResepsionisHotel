<?php

namespace App\Controllers;

use App\Models\PemesananModel;
use App\Models\PembayaranModel;

class Pembayaran extends BaseController
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

	public function bayar_kamar($id)
	{
		$tanggal = date('Y-m-d');
		$nominal = $this->request->getVar('nominal');
		$total = $this->request->getVar('total');
		$data = [
			'status_bayar' => 'Sudah dibayar'
		];

		if ($nominal < $total) {
			$this->pemesananModel->update($id, $data);
			$this->pembayaranModel->save([
				'id_pemesanan' => $id,
				'tgl_pembayaran' => $tanggal,
				'total_bayar' => $nominal
			]);

			return redirect()->to(base_url('pembayaran'));
		} else {
			session()->setFlashdata('pesan', 'Nominal kurang dari yang harus dibayarkan');
			return redirect()->to(base_url('pembayaran'));
		}
	}
}
