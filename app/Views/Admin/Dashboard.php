<?= $this->extend('layout/masterAdmin') ?>

<?= $this->section('content') ?>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header p-3">
                <h3>Dashboard Merchandise</h3>
                <strong>DM</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#content">
                        <i class="fas fa-home"></i>
                        Home
                    </a>
                </li>
                <li>
                    
                    <a href="#pageSubmenu">
                        <i class="fas fa-copy"></i>
                        Data Pemesanan
                    </a>
                <li>
                    <a href="#">
                        <i class="fas fa-paper-plane"></i>
                        Kontak
                    </a>
                    <hr>
                    <a href="#">
                        <i class="bi bi-box-arrow-left"></i>
                        Logout
                    </a>
                </li>
            </ul>

            
        </nav>

        <!-- KEMAKOM Merchandise  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded-3 shadow-sm">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-success">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <button type="button" class="btn btn-dark d-inline-block d-lg-none ml-auto" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                 <img src="<?= base_url('favicon.ico') ?>" alt="icon profile" height="40px">
                                <a class="nav-link bg-warning fw-bold px-3" href="#">KEMAKOM Merchanidise</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

           
            <div class="container mt-5">
                <!-- Menampilkan pesan flash -->
                <?php
                    $flash = session()->getFlashdata('success');
                    if ($flash) {
                        $currentTime = time();
                        $flashTime = $flash['timestamp'];
                        $message = $flash['message'];

                        // Menampilkan pesan jika waktu saat ini kurang dari 5 detik setelah timestamp
                        if (($currentTime - $flashTime) <= 5) {
                            echo '<div class="alert alert-success">' . $message . '</div>';
                        }
                    }
                ?>

                <h2 class="fw-bold mb-4 text-center text-white">KEMAKOM Merchandise</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-md-4">
                    <div class="card h-100 text-success d-flex flex-column justify-content-center align-items-center text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-box-seam" style="font-size: 5rem;"></i>
                        <h1 class="card-title fw-bold text-success my-0"><?= $orderCount ?></h1>
                        <h5 class="card-text">Pesanan</h5>
                    </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card h-100 text-info d-flex flex-column justify-content-center align-items-center text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-calendar-check" style="font-size: 5rem;"></i>
                        <h1 class="card-title fw-bold text-info my-0">Batch 2</h1>
                        <h5 class="card-text">4-5 September 2024</h5>
                    </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 text-warning d-flex flex-column justify-content-center align-items-center text-center shadow-sm">
                    <div class="card-body">
                        <i class="bi bi-pin-map-fill" style="font-size: 5rem;"></i>
                        <h1 class="card-title fw-bold text-warning my-0">at</h1>
                        <h5 class="card-text">IG Merchandise Kemakom & Website Kemakom</h5>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            

            <div class="line"></div>

            <div class="container-fluid mt-5">
            <h2 class="fw-bold text-center text-white mb-3">Data Pemesanan KEMAKOM Merchanidse</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari data yang kamu inginkan..." aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-success fw-bold" type="button" id="button-addon2">Cari Data  <i class="bi bi-search fw-bold"></i></button>
            </div>
            <div class="d-flex justify-content-center">
            <div class="table-responsive">
                <table class="table table-striped table-hover text-center align-middle bg-white p-3 rounded-lg shadow-sm">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Status Mahasiswa</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Produk Satuan</th>
                    <th scope="col">Paket Bundle</th>
                    <th scope="col">Ukuran Jaket</th>
                    <th scope="col">Desain Lanyard</th>
                    <th scope="col">Nametag</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Pembayaran</th>
                    <th scope="col">Bukti Pembayaran</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php if(count($merchs) > 0): ?>
                        <?php $no = 1; foreach ($merchs as $merch) :?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $merch['nama_lengkap']?></td>
                            <td><?= $merch['email']?></td>
                            <td><?= $merch['nomor_telepon']?></td>
                            <td><?= $merch['status_mahasiswa']?></td>
                            <td><?= $merch['nim']?></td>
                            <td><?= $merch['kelas']?></td>
                            <td><?= $merch['produk_satuan']?></td>
                            <td><?= $merch['paket_bundle']?></td>
                            <td><?= $merch['size_jaket']?></td>
                            <td><?= $merch['desain_lanyard']?></td>
                            <td><?= $merch['nametag']?></td>
                            <td><?= $merch['catatan']?></td>
                            <td><?= $merch['metode_pembayaran']?></td>
                            <td><?= $merch['pembayaran']?></td>
                            <td>
                                <?php if ($merch['bukti_pembayaran']): ?>
                                    <a href="<?= base_url('uploads/' . $merch['bukti_pembayaran']) ?>" target="_blank"><?= esc($merch['bukti_pembayaran']) ?></a>                                    
                                    <?php else: ?>
                                        Tidak Ada
                                <?php endif; ?>
                            </td>

                            <!-- Button trigger modal -->
                            <td>
                                <!-- Button trigger modal detail data-->
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalDetail-<?= $merch['id'] ?>"><i class="bi bi-file-earmark-person">Detail</i></a>
                                <!-- Button trigger modal edit data -->
                                <a href="#" class="btn btn-warning m-1" data-toggle="modal" data-target="#modalEditData-<?= $merch['id'] ?>"><i class="bi bi-pencil-square text-white">Edit</i></a>
                                <!-- Button trigger modal deleted data -->
                                <a href="#" class="btn btn-danger m-1" data-toggle="modal" data-target="#modalDeletedData-<?= $merch['id'] ?>"><i class="bi bi-trash3">Hapus</i></a>
                            </td>
                            <!-- Akhir Button trigger modal -->

                            <!-- Modal Detail Data -->
                            <div class="modal fade" id="modalDetail-<?= $merch['id'] ?>" tabindex="-1" aria-labelledby="modalDetailLabel-<?= $merch['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalDetailLabel-<?= $merch['id'] ?>">
                                                Detail Data
                                            </h1>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body fw-bold">
                                            <p>Nama : <?= $merch['nama_lengkap'] ?></p>
                                            <p>Email : <?= $merch['email'] ?></p>
                                            <p>Nomor : <?= $merch['nomor_telepon'] ?></p>
                                            <p>Status Mahasiswa : <?= $merch['status_mahasiswa'] ?></p>
                                            <p>NIM : <?= $merch['nim'] ?></p>
                                            <p>Kelas : <?= $merch['kelas'] ?></p>
                                            <p>Produk Satuan : <?= $merch['produk_satuan'] ?></p>
                                            <p>Paket Bundle : <?= $merch['paket_bundle'] ?></p>
                                            <p>Ukuran Jaket : <?= $merch['size_jaket'] ?></p>
                                            <p>Desain Lanyard : <?= $merch['desain_lanyard'] ?></p>
                                            <p>Nametag : <?= $merch['nametag'] ?></p>
                                            <p>Catatan : <?= $merch['catatan'] ?></p>
                                            <p>Metode Pembayaran : <?= $merch['metode_pembayaran'] ?></p>
                                            <p>Pembayaran : <?= $merch['pembayaran'] ?></p>
                                            <p>Bukti Pembayaran :</strong></p>
                                            <?php if ($merch['bukti_pembayaran']): ?>
                                                <img src="<?= base_url('uploads/' . $merch['bukti_pembayaran']) ?>" alt="Bukti Pembayaran" class="img-fluid" height="40">
                                                <?php else: ?>
                                                    <p>Tidak Bukti Pembayaran!</p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit Data -->
                            <div class="modal fade" id="modalEditData-<?= $merch['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('merch/update/' . $merch['id']); ?>" method="POST" enctype="multipart/form-data">
                                            <!-- Nama Lengkap -->
                                            <label for="nama_lengkap" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= old('nama_lengkap', $merch['nama_lengkap']) ?>"><br>
                                            <!-- Email -->
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?= old('email', $merch['email']) ?>"><br>
                                            <!-- Nomor Telepon -->
                                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= old('nomor_telepon', $merch['nomor_telepon']) ?>"><br>
                                            <!-- Status Mahasiswa -->
                                            <label for="status_mahasiswa" class="form-label">Status Mahasiswa</label>
                                            <select class="form-select mb-3" id="status_mahasiswa" aria-label="Default select example" name="status_mahasiswa">
                                                <option value="Mahasiswa Aktif" <?= old($merch['status_mahasiswa'] == 'Mahasiswa Aktif') ? 'selected' : '' ?>>Mahasiswa Aktif</option>
                                                <option value="Alumni" <?= old($merch['status_mahasiswa'] == 'Alumni') ? 'selected' : '' ?>>Alumni</option>
                                            </select>
                                            <!-- NIM -->
                                            <label for="nim" class="form-label">NIM</label>
                                            <input type="text" class="form-control" id="nim" name="nim" value="<?= old('nim', $merch['nim']) ?>"><br>
                                            <!-- Kelas -->
                                            <label for="kelas" class="form-label">Kelas</label>
                                            <select class="form-select mb-3" id="kelas" aria-label="Default select example" name="kelas">
                                                <option value="PILKOM A" <?= old($merch['kelas'] == 'PILKOM A') ? 'selected' : '' ?>>PILKOM A</option>
                                                <option value="PILKOM B" <?= old($merch['kelas'] == 'PILKOM B') ? 'selected' : '' ?>>PILKOM B</option>
                                                <option value="ILKOM C1" <?= old($merch['kelas'] == 'ILKOM C1') ? 'selected' : '' ?>>ILKOM C1</option>
                                                <option value="ILKOM C2" <?= old($merch['kelas'] == 'ILKOM C2') ? 'selected' : '' ?>>ILKOM C2</option>
                                            </select>
                                            <!-- Produk Satuan -->
                                            <label for="produk_satuan" class="form-label">Produk Satuan</label>
                                            <select class="form-select mb-3" id="produk_satuan" aria-label="Default select example" name="produk_satuan">
                                                <option value="Jaket" <?= old($merch['produk_satuan'] == 'Jaket') ? 'selected' : '' ?>>Jaket</option>
                                                <option value="Lanyard" <?= old($merch['produk_satuan'] == 'Lanyard') ? 'selected' : '' ?>>Lanyard</option>
                                                <option value="Nametag" <?= old($merch['produk_satuan'] == 'Nametag') ? 'selected' : '' ?>>Nametag</option>
                                                <option value="Mau Beli Bundle" <?= old($merch['produk_satuan'] == 'Mau Beli Bundle') ? 'selected' : '' ?>>Mau Beli Bundle</option>
                                            </select>
                                            <!-- Paket Bundle -->
                                            <label for="paket_bundle" class="form-label">Paket Bundle</label>
                                            <select class="form-select mb-3" id="paket_bundle" aria-label="Default select example"name="paket_bundle">
                                                <option value="Ternary Bundle (Jaket + Lanyard + Nametag)" <?= old($merch['paket_bundle'] == 'Ternary Bundle (Jaket + Lanyard + Nametag)') ? 'selected' : '' ?>>Ternary Bundle (Jaket + Lanyard + Nametag)</option>
                                                <option value="Binary Bundle (Jaket + Lanyard)" <?= old($merch['paket_bundle'] == 'Binary Bundle (Jaket + Lanyard)') ? 'selected' : '' ?>>Binary Bundle (Jaket + Lanyard)</option>
                                                <option value="Mau Beli Satuan" <?= old($merch['paket_bundle'] == 'Mau Beli Satuan') ? 'selected' : '' ?>>Mau Beli Satuan</option>
                                            </select>
                                            <!-- Ukuran Jaket -->
                                            <label for="size_jaket" class="form-label">Ukuran Jaket</label>
                                            <select class="form-select mb-3" id="size_jaket" aria-label="Default select example" name="size_jaket">
                                                <option value="S" <?= old($merch['size_jaket'] == 'S') ? 'selected' : '' ?>>S</option>
                                                <option value="M" <?= old($merch['size_jaket'] == 'M') ? 'selected' : '' ?>>M</option>
                                                <option value="L" <?= old($merch['size_jaket'] == 'L') ? 'selected' : '' ?>>L</option>
                                                <option value="XL" <?= old($merch['size_jaket'] == 'XL') ? 'selected' : '' ?>>XL</option>
                                                <option value="2XL" <?= old($merch['size_jaket'] == '2XL') ? 'selected' : '' ?>>2XL</option>
                                                <option value="3XL" <?= old($merch['size_jaket'] == '3XL') ? 'selected' : '' ?>>3XL</option>
                                                <option value="-" <?= old($merch['size_jaket'] == '-') ? 'selected' : '' ?>>-</option>
                                            </select>
                                            <!-- Desain Lanyard -->
                                            <label for="desain_lanyard" class="form-label">Desain Lanyard</label>
                                            <select class="form-select mb-3" id="desain_lanyard" aria-label="Default select example" name="desain_lanyard">
                                                <option value="First Edition" <?= old($merch['desain_lanyard'] == 'First Edition') ? 'selected' : '' ?>>First Edition</option>
                                                <option value="Arunikarsa Edition" <?= old($merch['desain_lanyard'] == 'Arunikarsa Edition') ? 'selected' : '' ?>>Arunikarsa Edition</option>
                                            </select>
                                            <!-- Nametag -->
                                            <label for="nametag" class="form-label">Nametag</label>
                                            <input type="text" class="form-control" id="nametag" name="nametag" value="<?= old('nametag', $merch['nametag']) ?>"><br>
                                            <!-- Catatan -->
                                            <label for="catatan" class="form-label">Catatan</label>
                                            <textarea class="form-control mb-3" id="catatan" name="catatan" rows="2"><?= old('catatan', $merch['catatan'] ?? '') ?></textarea>
                                            <!-- Metode Pembayaran -->
                                            <label for="metode_pembayaran" class="form-label" name="metode_pembayaran">Metode Pembayaran</label>
                                            <select class="form-select mb-3" id="metode_pembayaran" aria-label="Default select example">
                                                <option value="Transfer" <?= old($merch['metode_pembayaran'] == 'Transfer') ? 'selected' : '' ?>>Transfer</option>
                                                <option value="COD" <?= old($merch['metode_pembayaran'] == 'COD') ? 'selected' : '' ?>>COD</option>
                                                <option value="ShopeePay" <?= old($merch['metode_pembayaran'] == 'ShopeePay') ? 'selected' : '' ?>>ShopeePay</option>
                                                <option value="Gopay" <?= old($merch['metode_pembayaran'] == 'Gopay') ? 'selected' : '' ?>>Gopay</option>
                                            </select>
                                            <!-- Pembayaran -->
                                            <label for="pembayaran" class="form-label">Pembayaran</label>
                                            <select class="form-select mb-3" id="pembayaran" aria-label="Default select example" name="pembayaran">
                                                <option value="Lunas" <?= old($merch['pembayaran'] == 'Lunas') ? 'selected' : '' ?>>Lunas</option>
                                                <option value="Cicilan" <?= old($merch['pembayaran'] == 'Cicilan') ? 'selected' : '' ?>>Cicilan</option>
                                            </select>
                                            <!-- Bukti Pembayaran -->
                                            
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-warning">Ubah Data</button>
                                            </form>
                                            </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Hapus Data -->
                            <div class="modal fade" id="modalDeletedData-<?= $merch['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h3 class="fw-medium text-center">Yakin Ingin Hapus Data</h3>
                                            <h1 class="fw-bold text-center"><?= $merch['nama_lengkap']?>?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                            <a href="<?= base_url('merch/delete/' . $merch['id']); ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </tr>
                        <?php endforeach;?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Tidak ada data yang tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                </table>
                <?= $pager->makeLinks($currentPage, $limit, $totalRows) ?>
            </div>
            </div>
        </div>



            <div class="line"></div>

            <div class="container-fluid mt-5">
                <h3 class="fw-bold text-center mt-5 text-white mb-3">Kontak KEMAKOM Merchandise</h3>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col-md-12">
                    <div class="card h-100 text-info d-flex flex-column justify-content-center align-items-center text-center shadow-sm">
                    <div class="card-body d-flex flex-column align-items-center">
                        <i class="bi bi-telephone" style="font-size: 5rem;"></i>
                        <div class="d-flex flex-row align-items-center">
                            <h1 class="card-title fw-bold text-info my-0 ms-3">Narahubung</h1>
                        </div>
                        <ul class="list-unstyled m-3">
                            <li>
                                <a href="" class="btn btn-success">Kemakom Merch</a>
                                <a href="" class="btn btn-success">Kemakom Merch</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </div>
                </div>
            </div>

    </div>


    <?= $this->endSection() ?>