<?php

namespace App\Models;

use CodeIgniter\Model;

class Merch extends Model
{
    protected $table = 'merch';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = [
        'email', 'nomor_telepon', 'status_mahasiswa', 'kelas', 'nama_lengkap', 'nim',
        'produk_satuan', 'paket_bundle', 'size_jaket', 'desain_lanyard', 'nametag',
        'catatan', 'metode_pembayaran', 'pembayaran', 'bukti_pembayaran',
        'created_at', 'updated_at', 'deleted_at'
    ];
    

    protected $validationRules = [
        'email' => 'required|valid_email|max_length[255]',
        'nomor_telepon' => 'required|max_length[255]',
        'status_mahasiswa' => 'required|in_list[Mahasiswa Aktif,Alumni]',
        'kelas' => 'required|in_list[PILKOM A,PILKOM B,PILKOM C1,PILKOM C2]',
        'nama_lengkap' => 'required|max_length[255]',
        'nim' => 'required|max_length[20]',
        'produk_satuan' => 'required',
        'paket_bundle' => 'required|in_list[Ternary Bundle (Jaket + Lanyard + Nametag),Binary Bundle (Jaket + Lanyard),Mau Beli Satuan]',
        'size_jaket' => 'required|in_list[S,M,L,XL,2XL,3XL,-]',
        'desain_lanyard' => 'required|in_list[First Edition,Arunikarsa Edition,-]',
        'nametag' => 'required|max_length[255]',
        'catatan' => 'max_length[255]',
        'metode_pembayaran' => 'required|in_list[Transfer,COD,ShopeePay,Gopay]',
        'pembayaran' => 'required|in_list[lunas,cicil]',
        'bukti_pembayaran' => 'uploaded[bukti_pembayaran]|is_image[bukti_pembayaran]|max_size[bukti_pembayaran,2048]',
    ];
    

    protected $validationMessages = [
        'email' => [
            'required' => 'Email is required.',
            'valid_email' => 'Enter a valid email address.',
            'max_length' => 'Email cannot exceed 255 characters.'
        ],
        'nomor_telepon' => [
            'required' => 'Nomor Telepon is required.',
            'max_length' => 'Nomor Telepon cannot exceed 255 characters.'
        ],
        'status_mahasiswa' => [
            'required' => 'Status Mahasiswa is required.',
            'in_list' => 'Status Mahasiswa must be one of: Mahasiswa Aktif, Alumni.'
        ],
        'kelas' => [
            'required' => 'Kelas is required.',
            'in_list' => 'Kelas must be one of: PILKOM A, PILKOM B, PILKOM C1, PILKOM C2.'
        ],
        'nama_lengkap' => [
            'required' => 'Nama Lengkap is required.',
            'max_length' => 'Nama Lengkap cannot exceed 255 characters.'
        ],
        'nim' => [
            'required' => 'NIM is required.',
            'max_length' => 'NIM cannot exceed 20 characters.'
        ],
        'produk_satuan' => [
            'required' => 'Produk Satuan is required.'
        ],
        'paket_bundle' => [
            'required' => 'Paket Bundle is required.',
            'in_list' => 'Paket Bundle must be one of: bundle1, bundle2.'
        ],
        'size_jaket' => [
            'required' => 'Size Jaket is required.',
            'in_list' => 'Size Jaket must be one of: small, medium, large.'
        ],
        'desain_lanyard' => [
            'required' => 'Desain Lanyard is required.',
            'in_list' => 'Desain Lanyard must be one of: desain1, desain2.'
        ],
        'nametag' => [
            'required' => 'Nametag is required.',
            'max_length' => 'Nametag cannot exceed 255 characters.'
        ],
        'catatan' => [
            'max_length' => 'Catatan cannot exceed 255 characters.'
        ],
        'metode_pembayaran' => [
            'required' => 'Metode Pembayaran is required.',
            'in_list' => 'Metode Pembayaran must be one of: transfer, cash.'
        ],
        'pembayaran' => [
            'required' => 'Pembayaran is required.',
            'in_list' => 'Pembayaran must be one of: lunas, cicil.'
        ],
        'bukti_pembayaran' => [
            'uploaded' => 'Bukti Pembayaran is required.',
            'is_image' => 'Bukti Pembayaran must be an image file.',
            'max_size' => 'Bukti Pembayaran cannot exceed 2MB.'
        ],
    ];

    public function getPaginatedData($limit, $offset)
    {
        return $this->orderBy('created_at', 'DESC')->findAll($limit, $offset);
    }

    public function getTotalRows()
    {
        return $this->countAllResults();
    }
    
}
