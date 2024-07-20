<?php

namespace App\Controllers;

use App\Models\MerchModel;

class Merch extends BaseController
{
    protected $merchModel;
    public function __construct()
    {
        $this->merchModel = new MerchModel();
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus diisi'
                ]
            ],
            'no_wa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor WhatsApp harus diisi'
                ]
            ],
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIM harus diisi'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas harus diisi'
                ]
            ],
            'pesanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pesanan harus diisi'
                ]
            ],
            'size' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Size harus diisi'
                ]
            ],
            'desain_lanyard' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Desain Lanyard harus diisi'
                ]
            ],
            'nama_angkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Angkatan harus diisi'
                ]
            ],
            'metode_bayar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Metode Bayar harus diisi'
                ]
            ],
            'pembayaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pembayaran harus diisi'
                ]
            ],
            'bukti' => [
                'rules' => 'uploaded[bukti]|max_size[bukti,1024]|is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Bukti pembayaran harus diisi',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/')->withInput()->with('validation', $validation);
        }
        $bukti = $this->request->getFile('bukti');
        $bukti->move('img');
        $data = [
            'nama' => $this->request->getVar('nama'),
            'status' => $this->request->getVar('status'),
            'no_wa' => $this->request->getVar('no_wa'),
            'nim' => $this->request->getVar('nim'),
            'kelas' => $this->request->getVar('kelas'),
            'size' => $this->request->getVar('size'),
            'desain_lanyard' => $this->request->getVar('desain_lanyard'),
            'nama_angkatan' => $this->request->getVar('nama_angkatan'),
            'metode_bayar' => $this->request->getVar('metode_bayar'),
            'pembayaran' => $this->request->getVar('pembayaran'),
            'bukti' => $bukti->getName(),
            'catatan' => $this->request->getVar('catatan'),
            'pesanan' => implode(', ', $this->request->getVar('pesanan')),
        ];
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        $this->merchModel->save($data);
        return redirect()->to('/');
    }
}
