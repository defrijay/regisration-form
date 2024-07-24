<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Merch;
use CodeIgniter\HTTP\ResponseInterface;

class MerchController extends BaseController
{
    public function index()
    {
        $model = new Merch();
        $pager = \Config\Services::pager();
        $session = session();

        $data = [
            'title' => 'Dashboard Admin',
            'flash' => $session->getFlashdata('flash'),
            'merchs' => $model->paginate(20),
            'pager' => $model->pager,
            'currentPage' => $this->request->getVar('page') ?: 1,
            'limit' => 20,
            'totalRows' => $model->countAll(),
            'orderCount' => $model->countAll(),
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

    public function create(){
        return view('merch/create');
    }

    public function store(){
         $model = new Merch();
         $validation = \Config\Services::validation();
         $file = $this->request->getFile('bukti_pembayaran');

         $data = [
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'status_mahasiswa' => $this->request->getPost('status_mahasiswa'),
            'kelas' => $this->request->getPost('kelas'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nim' => $this->request->getPost('nim'),
            'produk_satuan[]' => $this->request->getPost('produk_satuan[]'),
            'size_jaket' => $this->request->getPost('size_jaket'),
            'desain_lanyard' => $this->request->getPost('desain_lanyard'),
            'nametag' => $this->request->getPost('nametag'),
            'catatan' => $this->request->getPost('catatan'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'pembayaran' => $this->request->getPost('pembayaran'),
            'bukti_pembayaran' => $file
         ];

         // Mengubah nilai array menjadi string
        $data['produk_satuan'] = implode(',', $this->request->getPost('produk_satuan'));

        if ($file->isValid() && !$file->hasMoved()) {
           $file->move('uploads/image', $file->getRandomName());
        }
         $model->save($data);
        // Set flashdata
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
         return redirect()->to('/');

    }

    public function edit($id){
        $model = new Merch();
        $data['merch'] = $model->find($id);
        return view('merch/edit', $data);
    }

    public function update($id)
{
    $model = new Merch();
    $validation = \Config\Services::validation();
    $file = $this->request->getFile('bukti_pembayaran');

    // Ambil data yang ada
    $existingData = $model->find($id);

    // Jika data tidak ditemukan
    if (!$existingData) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data tidak ditemukan');
    }

    // Data yang akan diupdate
    $data = [
        'email' => $this->request->getPost('email'),
        'nomor_telepon' => $this->request->getPost('nomor_telepon'),
        'status_mahasiswa' => $this->request->getPost('status_mahasiswa'),
        'kelas' => $this->request->getPost('kelas'),
        'nama_lengkap' => $this->request->getPost('nama_lengkap'),
        'nim' => $this->request->getPost('nim'),
        'produk_satuan[]' => $this->request->getPost('produk_satuan[]'),
        'size_jaket' => $this->request->getPost('size_jaket'),
        'desain_lanyard' => $this->request->getPost('desain_lanyard'),
        'nametag' => $this->request->getPost('nametag'),
        'catatan' => $this->request->getPost('catatan'),
        'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
        'pembayaran' => $this->request->getPost('pembayaran')
    ];

    // Mengubah nilai array menjadi string
    $data['produk_satuan'] = implode(',', $this->request->getPost('produk_satuan'));

    // Validasi file upload
    if ($file->isValid() && !$file->hasMoved()) {
        $fileName = $file->getRandomName();
        $file->move('uploads/image', $fileName);
        $data['bukti_pembayaran'] = $fileName;
    } else {
        // Jika tidak ada file baru, gunakan file yang lama
        $data['bukti_pembayaran'] = $existingData['bukti_pembayaran'];
    }

    // Validasi data
    // if (!$validation->run($data, 'merch')) {
    //     return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    // }

    // Update data
    $model->update($id, $data);

    // Set flashdata
    session()->setFlashdata('success', 'Data berhasil diupdate.');

    return redirect()->to('/admin');
}


    public function delete($id)
    {
        $model = new Merch();
        $model->delete($id);
    
        $session = session();
        $session->setFlashdata('success', [
            'message' => 'Data berhasil dihapus.',
            'timestamp' => time()
        ]);
    
        return redirect()->to('/admin');
    }
}
