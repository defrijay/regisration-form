<?php

namespace App\Models;

use CodeIgniter\Model;

class MerchModel extends Model
{
    protected $table = 'merch';
    protected $allowedFields = ['nama', 'status', 'no_wa', 'nim', 'kelas', 'pesanan', 'size', 'desain_lanyard', 'nama_angkatan', 'metode_bayar', 'pembayaran', 'bukti'];
    protected $useTimestamps = true;

    // save
    public function saveMerch($data)
    {
        dd($data);
    }
}
