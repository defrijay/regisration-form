<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>


<div class="container-fluid">
    <div class="row my-5 d-flex justify-content-center align-items-center">
        <div class="col-xl-10">
            <h2 class="text-center mb-4">
                <img src="<?= base_url('assets/images/form-title.svg') ?>" alt="" class="img-fluid form-title" alt="Formulir Pemesanan">
            </h2>

            <!-- Step buttons -->
            <div class="step-button-group mb-0">
                <button type="button" class="btn active" data-bs-target="#carouselExample" data-bs-slide-to="0" disabled>
                    <i class="bi bi-person-lines-fill text-white">Data Diri</i>
                </button>
                <button type="button" class="btn" data-bs-target="#carouselExample" data-bs-slide-to="1" disabled>
                    <i class="bi bi-cart4 text-white">Pemesanan Produk</i> 
                </button>
                <button type="button" class="btn" data-bs-target="#carouselExample" data-bs-slide-to="2" disabled>
                    <i class="bi bi-wallet2 text-white">Pembayaran Produk</i> 
                </button>
            </div>

            <?php if (session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner">
                    <!-- Slide Data Diri -->
                    <div class="carousel-item active">
                        <div class="card mx-auto" style="max-width: 100%;">
                            <div class="card-body">
                                <form id="registerForm" action="merch/store" method="POST" enctype="multipart/form-data" class="m-3">
                                    <?= csrf_field() ?>
                                    <div class="container">
                                        <div class="row">
                                            <!-- Email -->
                                            <div class="col-md-12 mb-3">
                                                <label for="email" class="form-label fw-bold">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>">
                                            </div>
                                            <!-- Nomor Telepon -->
                                            <div class="col-md-12 mb-3">
                                                <label for="nomor_telepon" class="form-label fw-bold">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= old('nomor_telepon') ?>">
                                            </div>
                                            <!-- Status Mahasiswa -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Status Mahasiswa</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="mahasiswa" name="status_mahasiwa" value="Mahasiswa Aktif" <?= old('status_mahasiswa') == 'Mahasiswa Aktif' ? 'checked' : '' ?>>
                                                    <label class="form-check-label fs-5" for="mahasiswa">
                                                        Mahasiswa Aktif
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="alumni" name="status_mahasiwa" value="Alumni" <?= old('status_mahasiswa') == 'Alumni' ? 'checked' : '' ?>>
                                                    <label class="form-check-label fs-5" for="alumni">
                                                        Alumni
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Data Kelas -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Kelas</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pilkomA" name="kelas" value="PILKOM A" <?= old('kelas') == 'PILKOM A' ? 'checked' : '' ?>>
                                                    <label class="form-check-label fs-5" for="pilkomA">
                                                        PILKOM A
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pilkomB" name="kelas" value="PILKOM B" <?= old('kelas') == 'PILKOM B' ? 'checked' : '' ?>>
                                                    <label class="form-check-label fs-5" for="pilkomB">
                                                        PILKOM B
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="ilkomC1" name="kelas" value="ILKOM C1" <?= old('kelas') == 'ILKOM C1' ? 'checked' : '' ?>>
                                                    <label class="form-check-label fs-5" for="ilkomC1">
                                                        ILKOM C1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="ilkomC2" name="kelas" value="ILKOM C2" <?= old('kelas') == 'ILKOM C2' ? 'checked' : '' ?>>
                                                    <label class="form-check-label fs-5" for="ilkomC2">
                                                        ILKOM C2
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Nama Lengkap -->
                                            <div class="mb-3">
                                                <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama_lengkap') ?>">
                                            </div>
                                            <!-- NIM -->
                                            <div class="mb-3">
                                                <label for="nim" class="form-label fw-bold">NIM</label>
                                                <input type="text" class="form-control" id="nim" name="nim" value="<?= old('nim') ?>" required>
                                            </div>
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide Pemesanan Produk -->
                    <div class="carousel-item">
                        <!-- Card Data Diri -->
                        <div class="card mx-auto" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Spesifikasi Produk</h3>
                               <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <Label class="fw-bold fs-4">Jaket</Label>
                                        <ul class="fs-5">
                                            <li>Bahan Luar : Kain Parasut Mayer</li>
                                            <li>Bahan Dalam : Kain Furing Jala Import</li>
                                            <li>Kancing Lengan : Knop Snop Button</li>
                                            <li>Jenis Sablon : DTF</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <Label class="fw-bold fs-4">Lanyard</Label>
                                        <ul class="fs-5">
                                            <li>Bahan : Polyester Tissue</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <Label class="fw-bold fs-4">Nametag</Label>
                                        <ul class="fs-5">
                                            <li>Bahan : Akrilik</li>
                                            <li>Ukuran : 8 x 2 cm</li>
                                            <li>Tebal : 1,5 mm</li>
                                        </ul>
                                    </div>
                                </div>
                               </div>
                            </div>
                        </div>
                        <!-- Card Satuan -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Produk Satuan</h3>
                                <div class="container">
                                    <div class="row d-flex align-items-center g-3">
                                        <div class="col-md-6">
                                            <img src="<?= base_url('assets/images/satuan.svg') ?>" alt="satuan" class="img-fluid w-100 form-title" alt="Formulir Pemesanan">
                                        </div>
                                        <div class="col-md-6 g-4 fs-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault1" name="produk_satuan[]" value="Jaket" <?= in_array('Jaket', old('produk_satuan', [])) ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="flexCheckDefault1">
                                                    Jaket : Rp170.000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault2" name="produk_satuan[]" value="Lanyard" <?= in_array('Lanyard', old('produk_satuan', [])) ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="flexCheckDefault2">
                                                    Lanyard : Rp20.000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault3" name="produk_satuan[]" value="Nametag" <?= in_array('Nametag', old('produk_satuan', [])) ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="flexCheckDefault3">
                                                    Nametag : Rp15.000
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="flexCheckDefault4" name="produk_satuan[]" value="Mau Beli Bundle" <?= in_array('Mau Beli Bundle', old('produk_satuan', [])) ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="flexCheckDefault4">
                                                    Mau beli bundle
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Bundle -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Paket Bundle</h3>
                                <div class="container">
                                    <div class="row d-flex align-items-center g-3">
                                        <div class="col-md-6">
                                            <img src="<?= base_url('assets/images/bundle.svg') ?>" alt="satuan" class="img-fluid w-100 form-title" alt="Formulir Pemesanan">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="ternary_bundle" name="paket_bundle" value="Ternary Bundle (Jaket + Lanyard + Nametag)" <?= old('paket_bundle') == 'Ternary Bundle (Jaket + Lanyard + Nametag)' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="ternary_bundle">
                                                    Ternary Bundle (Jaket + Lanyard + Nametag)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="binary_bundle" name="paket_bundle" value="Binary Bundle (Jaket + Lanyard)" <?= old('paket_bundle') == 'Binary Bundle (Jaket + Lanyard)' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="binary_bundle">
                                                    Binary Bundle (Jaket + Lanyard)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="mau_beli_satuan" name="paket_bundle" value="Mau Beli Satuan" <?= old('paket_bundle') == 'Mau Beli Satuan' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="mau_beli_satuan">
                                                    Mau beli satuan
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Size Chart Jaket -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Size Chart Jaket</h3>
                                <div class="container">
                                    <div class="row d-flex align-items-center g-3">
                                        <div class="col-md-6">
                                            <img src="<?= base_url('assets/images/sizeChart.svg') ?>" alt="satuan" class="img-fluid w-100 form-title" alt="Formulir Pemesanan">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="S" name="size_jaket" value="S" <?= old('size_jaket') == 'S' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="S">
                                                    S
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="M" name="size_jaket" value="M" <?= old('size_jaket') == 'M' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="M">
                                                    M
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="L" name="size_jaket" value="L" <?= old('size_jaket') == 'L' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="L">
                                                    L
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="XL" name="size_jaket" value="XL" <?= old('size_jaket') == 'XL' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="XL">
                                                    XL
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="2XL" name="size_jaket" value="2XL" <?= old('size_jaket') == '2XL' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="2XL">
                                                    2XL
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="3XL" name="size_jaket" value="3XL" <?= old('size_jaket') == '3XL' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="3XL">
                                                    3XL
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="-" name="size_jaket" value="-" <?= old('size_jaket') == '-' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="-">
                                                    -
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Desain Lanyard -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Desain Lanyard</h3>
                                <div class="container">
                                    <div class="row d-flex align-items-center g-3">
                                        <div class="col-md-6">
                                            <img src="<?= base_url('assets/images/desainLanyard.svg') ?>" alt="satuan" class="img-fluid w-100 form-title" alt="Formulir Pemesanan">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="First Edition" name="desain_lanyard" value="First Edition" <?= old('desain_lanyard') == 'First Edition' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="First Edition">
                                                    First Edition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="Arunikarsa Edition" name="desain_lanyard" value="Arunikarsa Edition" <?= old('desain_lanyard') == 'Arunikarsa Edition' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="Arunikarsa Edition">
                                                    Arunikarsa Edition
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="-" name="desain_lanyard" value="-" <?= old('desain_lanyard') == '-' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="-">
                                                    -
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Nama dan Angkatan-->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Nama dan Angkatan (untuk nametag)</h3>
                                <p>Yang tidak memesan nametag bisa diisi "-"</p>
                                    <div class="container">
                                        <div class="row d-flex align-items-center g-3">
                                            <div class="col-md-6">
                                                <img src="<?= base_url('assets/images/nametag.svg') ?>" alt="satuan" class="img-fluid w-100 form-title" alt="Formulir Pemesanan">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="sano manjirou" name="nametag" value="<?= old('nametag') ?>">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!-- Card Catatan-->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Catatan</h3>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"><?= old('catatan', $merch['catatan'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Slide Pembayaran Produk -->
                    <div class="carousel-item">
                        <!-- Card Metode Pembayaran -->
                        <div class="card mx-auto" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Metode Pembayaran</h3>
                                <p>Silakan lakukan pembayaran dengan salah satu metode pembayaran berikut!</p>
                                <div class="container">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <img src="<?= base_url('assets/images/bri.webp') ?>" alt="logo_bri" style="height: 30px; margin-right: 10px;">
                                            <strong> 411801017635534 </strong>(Begi Sugara)
                                            <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('411801017635534')"><i class="far fa-copy"></i></button>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="<?= base_url('assets/images/Shopee.svg.png') ?>" alt="logo_sp" style="height: 30px; margin-right: 10px;">
                                            <strong> 0895630536755 </strong>(Dinda Natania)
                                            <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('0895630536755')"><i class="far fa-copy"></i></button>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="<?= base_url('assets/images/gopay.png') ?>" alt="logo_gopay" style="height: 30px; margin-right: 10px;">
                                            <strong> 0895630536755 </strong>(Dinda Natania)
                                            <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('0895630536755')"><i class="far fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <!-- Metode Pembayaran -->
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="kelas" name="metode_pembayaran" value="transfer" <?= old('metode_pembayaran') == 'transfer' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="kelas">
                                                    Transfer
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="kelas" name="metode_pembayaran" value="COD" <?= old('metode_pembayaran') == 'COD' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="kelas">
                                                    COD (Hanya di UPI BUMSIL)
                                                </label>
                                            </div>
                                        </div>  
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="kelas" name="metode_pembayaran" value="ShopeePay" <?= old('metode_pembayaran') == 'ShopeePay' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="kelas">
                                                    ShopeePay
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="kelas" name="metode_pembayaran" value="Gopay" <?= old('metode_pembayaran') == 'Gopay' ? 'checked' : '' ?>>
                                                <label class="form-check-label fs-5" for="kelas">
                                                    Gopay
                                                </label>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Pembayaran -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Pembayaran</h3>
                                <!-- Metode Pembayaran -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" id="Lunas" name="pembayaran" value="Lunas" <?= old('pembayaran') == 'Lunas' ? 'checked' : '' ?>>
                                        <label class="form-check-label fs-5" for="Lunas">
                                            Lunas
                                        </label>
                                    </div>
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" id="Cicilan" name="pembayaran" value="Cicilan" <?= old('kelas') == 'Cicilan' ? 'checked' : '' ?> required>
                                        <label class="form-check-label fs-5" for="Cicilan">
                                            Cicilan (Min. DP setengah harga)
                                        </label>
                                    </div>
                                </div>                                            
                            </div>
                        </div>

                        <!-- Card Upload Pembayaran -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3 class="fw-bold">Upload Bukti Pembayaran</h3>
                                <p>Silahkan upload bukti pembayaran</p>
                                <input type="file" class="form-control " id="bukti_pembayaran" name="bukti_pembayaran" required>
                                <div id="help" class="form-text text-danger my-2=3">*pastikan seluruh data terisi dengan benar!</div>
                            </form>
                        </div>
                    </div>
                    <div class="collapse mt-4" id="collapseExample">  
                    </div>
                    
                    </div>
                </div>
            </div>

           <!-- Navigation buttons -->
            <div class="btn-container">
                <button id="prevBtn" class="btn btn-outline prev-btn text-white" style="display: none;" data-bs-target="#carouselExample" data-bs-slide="prev">Sebelumnya</button>
                <button id="nextBtn" class="btn btn-dark register-btn text-white" data-bs-target="#carouselExample" data-bs-slide="next">Selanjutnya</button>
                <button id="submitBtn" class="btn register-btn text-white" style="display: none;" type="submit" form="registerForm">Submit</button>
            </div>

        </div>

    </div>
</div>

<script>
    // SnK focus
    var collapseExample = document.getElementById('collapseExample');
    collapseExample.addEventListener('shown.bs.collapse', function() {
        collapseExample.scrollIntoView({
            behavior: 'smooth'
        });
    });
    // SnK focus

    const carousel = document.querySelector('#carouselExample');
    const prevBtn = document.querySelector('#prevBtn');
    const nextBtn = document.querySelector('#nextBtn');
    const submitBtn = document.querySelector('#submitBtn');
    const buttons = document.querySelectorAll('.step-button-group .btn');

    carousel.addEventListener('slid.bs.carousel', function(event) {
        const activeIndex = event.to;

        buttons.forEach((btn, index) => {
            btn.classList.toggle('active', index === activeIndex);
        });

        if (activeIndex === 0) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'block';
            submitBtn.style.display = 'none';
        } else if (activeIndex === buttons.length - 2) {
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'block';
            submitBtn.style.display = 'none';
        } else if (activeIndex === buttons.length - 1) {
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'block';
        } else {
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'block';
            submitBtn.style.display = 'none';
        }
    });

    prevBtn.addEventListener('click', () => {
        carousel.querySelector('.carousel-control-prev').click();
    });

    nextBtn.addEventListener('click', () => {
        carousel.querySelector('.carousel-control-next').click();
    });

    // Function to copy text to clipboard
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text)
            .then(() => {
                console.log('Text copied to clipboard');
                alert('Nomor berhasil disimpan di clipboard');
            })
            .catch(err => {
                console.error('Unable to copy text to clipboard', err);
                alert('Gagal menyimpan nomor di clipboard');
            });
    }
</script>

<?= $this->endSection() ?>