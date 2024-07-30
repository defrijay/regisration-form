<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Merch;
use CodeIgniter\HTTP\ResponseInterface;

class MerchController extends BaseController
{
    public function index()
    {
        // Buat objek data dan session
        $model = new Merch();
        $session = session();

        // Ambil request data dari variable search
        $search = $this->request->getGet('search');
        $data = [
            'title' => 'Dashboard Admin',
            'flash' => $session->getFlashdata('flash'),
        ];

        // Kondisi grouping untuk menampilkan pencarian data nama
        if ($search) {
            $data['merchs'] = $model->like('nama_lengkap', $search)
                ->orderBy('created_at', 'DESC')
                ->paginate(20, 'merchs');
            $data['totalRows'] = $model->like('nama_lengkap', $search)
                ->countAllResults();
        } else {
            $data['merchs'] = $model
                ->orderBy('created_at', 'DESC')
                ->paginate(20, 'merchs');
            $data['totalRows'] = $model->countAll();
        }

        // Penanganan untuk fitur grouping pagination
        $data['nomor'] = nomor($this->request->getVar('page_merchs'), 20);
        $data['pager'] = $model->pager;
        $data['currentPage'] = $this->request->getVar('page') ?: 1;
        $data['limit'] = 20;
        $data['orderCount'] = $data['totalRows'];

        // Tampilkan halaman dashboard
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

    // Method untuk mengirimkan data ke database
    public function store()
    {
        // Buat objek model, panggil validasi, dan buat judul pesan berhasil
        $model = new Merch();
        $validation = \Config\Services::validation();
        $title = "Pendaftaran Berhasil";

        // Ambil variable bukti_pembayaran dari inputan
        $file = $this->request->getFile('bukti_pembayaran');

        // Set rules dan pesan error kustom untuk validasi
        $validation->setRules([
            'email' => [
                'rules' => 'required|valid_email|max_length[255]',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Enter a valid email address.',
                    'max_length' => 'Email tidak boleh lebih dari 255 characters.'
                ]
            ],
            'nomor_telepon' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi!',
                    'max_length' => 'Nomor Telepon tidak boleh lebih dari 20 characters.'
                ]
            ],
            'status_mahasiswa' => [
                'rules' => 'required|in_list[Mahasiswa Aktif,Alumni]',
                'errors' => [
                    'required' => 'Status Mahasiswa harus diisi!',
                    'in_list' => 'Status Mahasiswa harus pilih salah satu, yaitu Mahasiswa Aktif, Alumni.'
                ]
            ],
            'kelas' => [
                'rules' => 'required|in_list[PILKOM A,PILKOM B,ILKOM C1,ILKOM C2]',
                'errors' => [
                    'required' => 'Kelas harus diisi!',
                    'in_list' => 'Kelas harus pilih salah satu, yaitu PILKOM A, PILKOM B, ILKOM C1, ILKOM C2.'
                ]
            ],
            'nama_lengkap' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama Lengkap harus diisi!',
                    'max_length' => 'Nama Lengkap tidak boleh lebih dari 255 characters.'
                ]
            ],
            'nim' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'NIM harus diisi!',
                    'max_length' => 'NIM tidak boleh lebih dari 20 characters.'
                ]
            ],
            'produk_satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Produk Satuan harus diisi!'
                ]
            ],
            'paket_bundle' => [
                'rules' => 'required|in_list[Ternary Bundle (Jaket + Lanyard + Nametag),Binary Bundle (Jaket + Lanyard),Mau Beli Satuan]',
                'errors' => [
                    'required' => 'Paket Bundle harus diisi!',
                    'in_list' => 'Paket Bundle harus pilih salah satu, yaitu Ternary Bundle (Jaket + Lanyard + Nametag), Binary Bundle (Jaket + Lanyard), Mau Beli Satuan.'
                ]
            ],
            'size_jaket' => [
                'rules' => 'required|in_list[S,M,L,XL,2XL,3XL,-]',
                'errors' => [
                    'required' => 'Size Jaket harus diisi!',
                    'in_list' => 'Size Jaket harus pilih salah satu, yaitu S, M, L, XL, 2XL, 3XL, -.'
                ]
            ],
            'desain_lanyard' => [
                'rules' => 'required|in_list[First Edition,Arunikarsa Edition,-]',
                'errors' => [
                    'required' => 'Desain Lanyard harus diisi!',
                    'in_list' => 'Desain Lanyard harus pilih salah satu, yaitu First Edition, Arunikarsa Edition, -.'
                ]
            ],
            'nametag' => [
                'rules' => 'required|max_length[50]',
                'errors' => [
                    'required' => 'Nametag harus diisi!',
                    'max_length' => 'Nametag tidak boleh lebih dari 50 characters!'
                ]
            ],
            'catatan' => [
                'rules' => 'max_length[255]',
                'errors' => [
                    'max_length' => 'Catatan tidak boleh lebih dari 255 characters!'
                ]
            ],
            'metode_pembayaran' => [
                'rules' => 'required|in_list[Transfer,COD,ShopeePay,Gopay]',
                'errors' => [
                    'required' => 'Metode Pembayaran harus diisi!',
                    'in_list' => 'Metode Pembayaran harus pilih salah satu, yaitu Transfer, COD, ShopeePay, Gopay.'
                ]
            ],
            'pembayaran' => [
                'rules' => 'required|in_list[Lunas,Cicilan]',
                'errors' => [
                    'required' => 'Pembayaran harus diisi!',
                    'in_list' => 'Pembayaran harus pilih salah satu, yaitu Lunas, Cicilan.'
                ]
            ],
            'bukti_pembayaran' => [
                'rules' => 'max_size[bukti_pembayaran,8192]|ext_in[bukti_pembayaran,jpg,jpeg,png,pdf,webp,svg]',
                'errors' => [
                    'max_size' => 'File bukti pembayaran tidak boleh lebih dari 8MB!',
                    'ext_in' => 'File bukti pembayaran must be in one of the following formats: jpg, jpeg, png, pdf, webp, svg.'
                ]
            ],
        ]);

        //  Jika error, maka beri pesan erronya
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // Ambil data inputan
        $data = [
            'email' => $this->request->getPost('email'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'status_mahasiswa' => $this->request->getPost('status_mahasiswa'),
            'kelas' => $this->request->getPost('kelas'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nim' => $this->request->getPost('nim'),
            'produk_satuan' => implode(',', $this->request->getPost('produk_satuan')),
            'size_jaket' => $this->request->getPost('size_jaket'),
            'desain_lanyard' => $this->request->getPost('desain_lanyard'),
            'nametag' => $this->request->getPost('nametag'),
            'catatan' => $this->request->getPost('catatan'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'pembayaran' => $this->request->getPost('pembayaran'),
            'bukti_pembayaran' => $file,
        ];
    
        // Validasi file upload
        if ($file->isValid() && !$file->hasMoved()) {
            $randomName = $file->getRandomName();
            $file->move('uploads/image', $randomName);
            $data['bukti_pembayaran'] = $randomName;
        } else {
            $data['bukti_pembayaran'] = null;
        }
    
        // Input datanya ke database
        $model->save($data);
    
        // Ambil ID terakhir yang disimpan
        $lastId = $model->getInsertID();
    
        // Ambil data yang baru disimpan berdasarkan ID
        $newData = $model->find($lastId);
    
        // Set flashdata
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
    
        // Arahkan ke halaman success dengan data
        return view('success', [
            'title' => $title,
            'merchs' => [$newData]
        ]);
    }
    
    
    
    // Method untuk mengedit data pelanggan berdasarkan id
    public function edit($id){
        $model = new Merch();
        $data['merch'] = $model->find($id);
        return view('merch/edit', $data);
    }

    // Method untuk memperbarui data pelanggan berdasarkan id
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


    // Method untuk menghapus data pelanggan berdasarkan id
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
