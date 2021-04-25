<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'nik';
    protected $allowedFields = ['password', 'nama'];

    public function cek_login($nik, $password)
    {
        return $this->db->table('pegawai')
            ->where(array('nik' => $nik, 'password' => $password))
            ->get()->getRowArray();
    }
}
