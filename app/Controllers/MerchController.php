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
            'orderCount' => $model->countAll()
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

    // public function store(){
    //      $model = new Merch();
    //      $validation = \Config\Services::validation();
    //      $file = $this->request->getFile('bukti_pembayaran');

    //      if ($file->isValid() && !$file->hasMoved()) {
    //         $imageName = $file->getRandomName();
    //         $file->move('uploads/', $imageName);
    //      }

    //      $data = [
    //         'email' => $this->request->getPost('email'),
    //         'nomor_telepon' => $this->request->getPost('nomor_telepon'),
    //         'status_mahasiswa' => $this->request->getPost('status_mahasiswa'),
    //         'kelas' => $this->request->getPost('kelas'),
    //         'nama_lengkap' => $this->request->getPost('nama_lengkap'),
    //         'nim' => $this->request->getPost('nim'),
    //         'produk_satuan[]' => $this->request->getPost('produk_satuan[]'),
    //         'size_jaket' => $this->request->getPost('size_jaket'),
    //         'desain_lanyard' => $this->request->getPost('desain_lanyard'),
    //         'nametag' => $this->request->getPost('nametag'),
    //         'catatan' => $this->request->getPost('catatan'),
    //         'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
    //         'pembayaran' => $this->request->getPost('pembayaran'),
    //         'bukti_pembayaran' => $imageName
    //      ];
    //      $session = session();
    //      $model->save($data);
    //     // Set flashdata
    //     session()->setFlashdata('success', 'Data berhasil ditambahkan.');
    //      return redirect()->to('/');

    // }

    public function store()
{
    $model = new Merch();
    $validation = \Config\Services::validation();
    
    // Mengambil data inputan
    $data = $this->request->getPost();

    // Debugging
    log_message('debug', 'Data inputan: ' . print_r($data, true));

    // Menentukan aturan validasi
    $rules = $model->validationRules;
    
    // Validasi data
    if (!$this->validate($rules)) {
        log_message('debug', 'Validation errors: ' . print_r($validation->getErrors(), true));
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }
    
    // Mengubah nilai array menjadi string
    $data['produk_satuan'] = implode(',', $this->request->getPost('produk_satuan'));

    // Debugging
    log_message('debug', 'Data setelah perubahan: ' . print_r($data, true));
    
    // Mengelola upload file
    $file = $this->request->getFile('bukti_pembayaran');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $uploadPath = WRITEPATH . 'uploads/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }
    
        $newName = $file->getRandomName();
        $file->move($uploadPath, $newName);
        $data['bukti_pembayaran'] = $newName;
    }

    // Debugging
    log_message('debug', 'Data sebelum disimpan: ' . print_r($data, true));
    
    // Simpan data ke database
    if ($model->insert($data) === false) {
        log_message('error', 'Gagal menyimpan data: ' . print_r($model->errors(), true));
    }
    
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
    
        // Mengambil data inputan
        $data = $this->request->getPost();

        // Menentukan aturan validasi
        $rules = $model->validationRules;

        // Menghapus aturan validasi untuk 'bukti_pembayaran' jika tidak ada file yang diupload
        if ($this->request->getFile('bukti_pembayaran')->getError() == 4) {
            unset($rules['bukti_pembayaran']);
        }

        // Validasi data
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Mengubah nilai array menjadi string
        $data['produk_satuan'] = implode(',', $this->request->getPost('produk_satuan'));

        // Mengelola upload file
        $file = $this->request->getFile('bukti_pembayaran');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $data['bukti_pembayaran'] = $newName;
        } else {
            unset($data['bukti_pembayaran']);
        }
    
        // Update data di database
        $model->update($id, $data);
    
        // Set flashdata
        session()->setFlashdata('success', 'Data berhasil diubah.');
    
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
