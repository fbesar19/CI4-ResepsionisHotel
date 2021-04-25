<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table = 'kamar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_kamar', 'jenis_kamar', 'stok_kamar', 'harga_sewa', 'maksimal_penghuni', 'gambar'];
}
