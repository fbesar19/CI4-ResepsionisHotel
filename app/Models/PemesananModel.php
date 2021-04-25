<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananModel extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $allowedFields = ['tgl_pemesanan', 'nama_pemesan', 'nik_pemesan', 'no_kontak', 'list_pemesanan', 'total_biaya', 'status_bayar'];
}
