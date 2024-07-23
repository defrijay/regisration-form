<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Merch;
use CodeIgniter\HTTP\ResponseInterface;

class MerchController extends BaseController
{
    // Method ambil data dari model database
    public function index()
    {
        $model = new Merch();
        $pager = \Config\Services::pager();

        $data = [
            'title' => 'Dashboard Admin',
            'merchs' => $model->paginate(20),
            'pager' => $model->pager,
            'currentPage' => $this->request->getVar('page') ?: 1,
            'limit' => 20,
            'totalRows' => $model->countAll()
        ];
        return view('Admin/Dashboard', $data);
    }

    public function show($id)
    {
        $model = new Merch();
        $data['merchs'] = $model->find($id);

        if (!$data['merchs']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data not found');
        }

        return view('merch/show', $data);
    }
    
    // Method buat data ke model database
    public function create(){
        return view('merch/create');
    }

    // Method kirim data inputan ke database
    public function store(){
        // Buat objek model database ke variable dan import validasinya
        $model = new Merch();
        $validation = \config\Services::validation();
         // Ambil request data post
        $data = $this->request->getPost();
        // Mengubah nilai array menjadi string
        $data['produk_satuan'] = implode(',', $this->request->getPost('produk_satuan'));
        // Penanganan validasi dan file saat upload bukti pembayaran
        if ($validation->run($data, 'merch') && $this->validate($model->getValidationRules())) {
            $buktiPembayaran = $this->request->getFile('bukti_pembayaran');
            // Kondisi jika data valid dan berhasil dipindahkan
            if ($buktiPembayaran->isValid() && !$buktiPembayaran->hasMoved()) {
                $buktiName = $buktiPembayaran->getRandomName();
                $buktiPembayaran->move(WRITEPATH . 'uploads', $buktiName);
                $data['bukti_pembayaran'] = $buktiName;
            }
            // Penyimpana data inputan ke database
            $model->save($data);            // Simpan data ke database
            return redirect()->to('/merch/store');
        // Kondisi jika gagal upload ke database
        } else {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
    }

    // Method untuk mengedit data
    public function edit($id){
        $model = new Merch();
        $data['merch'] = $model->find($id);
        // Arahkan ke url merch/edit
        return view('merch/edit', $data);
    }

    // Method untuk mengupdate data
    public function update($id){
        // Buat objek model database ke variable dan import validasinya
        $model = new Merch();
        $validation = \config\Services::validation();
        // Ambil request data post
        $data = $this->request->getPost();
        // Mengubah nilai array menjadi string
        $data['produk_satuan'] = implode(',', $this->request->getPost('produk_satuan'));
        // Penanganan validasi dan file saat upload bukti pembayaran
        if ($validation->run($data, 'merch') && $this->validate($model->getValidationRules())) {
            $buktiPembayaran = $this->request->getFile('bukti_pembayaran');
            // Kondisi jika data valid dan berhasil dipindahkan
            if ($buktiPembayaran->isValid() && !$buktiPembayaran->hasMoved()) {
                $buktiName = $buktiPembayaran->getRandomName();
                $buktiPembayaran->move(WRITEPATH . 'uploads', $buktiName);
                $data['bukti_pembayaran'] = $buktiName;
            }
            // Penyimpana data inputan ke database
            $model->update($id, $data);            // Simpan data ke database
            return redirect()->to('/merch');// Arahkan ke url /merch
        // Kondisi jika gagal upload ke database
        } else {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
    }

    // Method untuk menghapus data
    public function delete($id){
        // Buat objek untuk variabelnya lalu hapus datanya
        $model = new Merch();
        $model->delete($id);

        // Arahkan ke url /merch
        return redirect()->to('/merch'); 
    }

}
