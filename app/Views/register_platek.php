<?= $this->extend('layout/master_platek') ?>

<?= $this->section('content') ?>
<style>
    body {
        background-image: url('assets/images/latar1.svg');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .step-button-group {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-bottom: 20px;
        /* background-color: #e0e0e0; */
        border-radius: 10px 10px 0px 0px;
        background: linear-gradient(270deg, #FEB862 20%, #E46C6E 100%);

    }

    .step-button-group .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 20px;
        color: black;
        font-weight: bold;
        margin: 5px;
        flex: 1 1 auto;
    }

    .step-button-group .btn.active {
        background-color: rgba(220, 220, 220, 0.5);
        color: white !important;
        opacity: 1;
    }

    .carousel-item .card {
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 100%;
        border-radius: 0px 0px 10px 10px !important;
    }

    .btn-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .btn-container .btn {
        margin: 5px;
    }

    .form-title {
        max-width: 375px !important;
    }
</style>
<!-- //jika sukses submit, maka akan muncul alert -->
<?php if (session()->getFlashdata('success')) : ?>
    alert('<?= session()->getFlashdata('success') ?>');
<?php elseif (session()->getFlashdata('error')) : ?>
    alert('<?= session()->getFlashdata('error') ?>');
<?php endif; ?>
<div class="container-fluid">
    <div class="row my-5 d-flex justify-content-center align-items-center">
        <div class="col-xl-10">
            <h2 class="text-center mb-4">
                <img src="<?= base_url('assets/images/form-title.svg') ?>" alt="" class="img-fluid form-title" alt="Formulir Pemesanan">
            </h2>
            <?= $validation->listErrors() ?>
            <!-- Step buttons -->
            <div class="step-button-group mb-0">
                <button type="button" class="btn active" data-bs-target="#carouselExample" data-bs-slide-to="0" disabled>
                    <i class="bi bi-person-lines-fill">Data Diri</i>
                </button>
                <button type="button" class="btn" data-bs-target="#carouselExample" data-bs-slide-to="1" disabled>
                    <i class="bi bi-cart4">Pemesanan Produk</i>
                </button>
                <button type="button" class="btn" data-bs-target="#carouselExample" data-bs-slide-to="2" disabled>
                    <i class="bi bi-wallet2">Pembayaran Produk</i>
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
                                <form id="registerForm" action="<?= base_url('/save') ?>" method="post" enctype="multipart/form-data" class="m-3">
                                    <?= csrf_field(); ?>
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-md-12 mb-3">
                                                <label for="email" class="form-label fw-bold">Email</label>
                                                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email') ?>" required>
                                                <div class="is-invalid">
                                                    <?= $validation->getError('email') ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="no_wa" class="form-label fw-bold">Nomor WhatsApp</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('no_wa')) ? 'is-invalid' : ''; ?>" id="no_wa" name="no_wa" value="<?= old('wa') ?>" required>
                                                <div class="is-invalid">
                                                    <?= $validation->getError('no_wa') ?>
                                                </div>
                                            </div>

                                            <!-- Status Mahasiswa -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Status Mahasiswa</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="mahasiswa" name="status" value="Mahasiswa Aktif" <?= old('status') == 'Mahasiswa Aktif' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="status">
                                                        Mahasiswa Aktif
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="alumni" name="status" value="Alumni" <?= old('status') == 'Alumni' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="status">
                                                        Alumni
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Data Kelas -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Kelas</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pilkomA" name="kelas" value="Pilkom A" <?= old('kelas') == 'Pilkom A' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        PILKOM A
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="pilkomB" name="kelas" value="pilkomB" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        PILKOM B
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="ilkomC1" name="kelas" value="ilkomC1" <?= old('kelas') == 'ilkomC1' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        ILKOM C1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="ilkomC2" name="kelas" value="ilkomC2" <?= old('kelas') == 'ilkomC2' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        ILKOM C2
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?>" required>
                                                <div class="is-invalid">
                                                    <?= $validation->getError('nama') ?>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nim" class="form-label fw-bold">NIM</label>
                                                <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= old('nim') ?>" required>
                                                <div class="is-invalid">
                                                    <?= $validation->getError('nim') ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide Pemesanan Produk -->
                    <div class=" carousel-item">
                        <!-- Card Data Diri -->
                        <div class="card mx-auto" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3>Spesifikasi Produk</h3>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <Label class="fw-bold">Jaket</Label>
                                            <ul>
                                                <li>Bahan Luar : Kain Parasut Mayer</li>
                                                <li>Bahan Dalam : Kain Furing Jala Import</li>
                                                <li>Kancing Lengan : Knop Snop Button</li>
                                                <li>Jenis Sablon : DTF</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <Label class="fw-bold">Lanyard</Label>
                                            <ul>
                                                <li>Bahan : Polyester Tissue</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4">
                                            <Label class="fw-bold">Nametag</Label>
                                            <ul>
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
                                <h3>Produk Satuan</h3>
                                <h1>ceritanya gambar!</h1>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 form-check">
                                            <input class="form-check-input" type="checkbox" value="Jaket" id="Jaket" name="pesanan[]">
                                            <label class="form-check-label fs-5" for="Jaket">
                                                Jaket : Rp170.000
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-check">
                                            <input class="form-check-input" type="checkbox" value="Lanyard" id="Lanyard" name="pesanan[]">
                                            <label class="form-check-label fs-5" for="Lanyard">
                                                Lanyard : Rp20.000
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-check">
                                            <input class="form-check-input" type="checkbox" value="Name tag" id="Name tag" name="pesanan[]">
                                            <label class="form-check-label fs-5" for="Name tag">
                                                Name tag : Rp15.000
                                            </label>
                                        </div>
                                        <div class="col-md-6 form-check">
                                            <input class="form-check-input <?= ($validation->hasError('pesanan')) ? 'is-invalid' : ''; ?>" type="checkbox" value="bundle" id="bundle" name="pesanan[]">
                                            <label class="form-check-label fs-5" for="bundle">
                                                Mau beli bundle
                                            </label>
                                            <div class="is-invalid">
                                                <?= $validation->getError('pesanan') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Bundle -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3>Paket Bundle</h3>
                                <h1>ceritanya gambar!</h1>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4 form-check">
                                            <input class="form-check-input" type="radio" id="Ternary" name="pesanan[]" value=" Ternary Bundle" <?= old('pesanan') == 'Ternary Bundle' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="Ternary">
                                                Ternary Bundle (Jaket + Lanyard + Nametag)
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-check">
                                            <input class="form-check-input" type="radio" id="Binary" name="pesanan[]" value="Binary Bundle" <?= old('pesanan') == 'Binary Bundle' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="Binary">
                                                Binary Bundle (Jaket + Lanyard)
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-check">
                                            <input class="form-check-input <?= ($validation->hasError('pesanan')) ? 'is-invalid' : ''; ?>" type="radio" id="satuan" name="pesanan[]" value="satuan" <?= old('pesanan') == 'pesanan B' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="satuan">
                                                Mau beli satuan
                                            </label>
                                            <div class="is-invalid">
                                                <?= $validation->getError('pesanan') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card Size Chart Jaket -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3>Size Chart Jaket</h3>
                                <h1>ceritanya gambar!</h1>
                                <div class="container">
                                    <div class="row g-2">
                                        <div class="col-md-3 form-check">
                                            <input class="form-check-input" type="radio" name="size" id="size" value="S" <?= old('size') == 'S' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="size">
                                                S
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-check">
                                            <input class="form-check-input" type="radio" name="size" id="size" value="M" <?= old('size') == 'M' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="size">
                                                M
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-check">
                                            <input class="form-check-input" type="radio" name="size" id="size" value="L" <?= old('size') == 'L' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="size">
                                                L
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-check">
                                            <input class="form-check-input" type="radio" name="size" id="size" value="XL" <?= old('size') == 'XL' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="size">
                                                XL
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-check">
                                            <input class="form-check-input" type="radio" name="size" id="size" value="2XL" <?= old('size') == '2XL' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="size">
                                                2XL
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-check">
                                            <input class="form-check-input" type="radio" name="size" id="size" value="3XL" <?= old('size') == '3XL' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="size">
                                                3XL
                                            </label>
                                        </div>
                                        <div class="col-md-3 form-check">
                                            <input class="form-check-input <?= ($validation->hasError('size')) ? 'is-invalid' : ''; ?>" type="radio" name="size" id="size" value="-" <?= old('size') == '-' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="size">
                                                -
                                            </label>
                                            <div class="is-invalid">
                                                <?= $validation->getError('size') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Desain Lanyard -->
                            <div class="card mx-auto my-3" style="max-width: 100%;">
                                <div class="card-body m-3">
                                    <h3>Desain Lanyard</h3>
                                    <h1>ceritanya gambar!</h1>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4 form-check">
                                                <input class="form-check-input" type="radio" name="desain_lanyard" id="desain_lanyard" value="First Edition" <?= old('desain_lanyard') == 'First Edition' ? 'checked' : '' ?> required>
                                                <label class="form-check-label fs-5" for="desain_lanyard">
                                                    First Edition
                                                </label>
                                            </div>
                                            <div class="col-md-4 form-check">
                                                <input class="form-check-input" type="radio" name="desain_lanyard" id="desain_lanyard" value="Arunikarsa Edition" <?= old('desain_lanyard') == 'Arunikarsa Edition' ? 'checked' : '' ?> required>
                                                <label class="form-check-label fs-5" for="desain_lanyard">
                                                    Arunikarsa Edition
                                                </label>
                                            </div>
                                            <div class="col-md-4 form-check">
                                                <input class="form-check-input <?= ($validation->hasError('desain_lanyard')) ? 'is-invalid' : ''; ?>" type="radio" name="desain_lanyard" id="desain_lanyard" value="-" <?= old('desain_lanyard') == '-' ? 'checked' : '' ?> required>
                                                <label class=" form-check-label fs-5" for="desain_lanyard">
                                                    -
                                                </label>
                                                <div class="is-invalid">
                                                    <?= $validation->getError('desain_lanyard') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Nama dan Angkatan-->
                            <div class="card mx-auto my-3" style="max-width: 100%;">
                                <div class="card-body m-3">
                                    <h3>Nama dan Angkatan (untuk nametag)</h3>
                                    <p>Yang tidak memesan nametag bisa diisi "-"</p>
                                    <h1>ceritanya gambar!</h1>
                                    <input type="text" class="form-control <?= ($validation->hasError('nama_angkatan')) ? 'is-invalid' : ''; ?>" id="nama_angkatan" name="nama_angkatan" placeholder="sano manjirou" value="<?= old('nama_angkatan') ?>" required>
                                    <div class="is-invalid">
                                        <?= $validation->getError('nama_angkatan') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Catatan-->
                            <div class=" card mx-auto my-3" style="max-width: 100%;">
                                <div class="card-body m-3">
                                    <h3>Catatan</h3>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="2"></textarea>
                                </div>
                            </div>


                        </div>

                        <!-- Slide Pembayaran Produk -->
                        <div class="carousel-item">
                            <!-- Card Metode Pembayaran -->
                            <div class="card mx-auto" style="max-width: 100%;">
                                <div class="card-body m-3">
                                    <h3>Metode Pembayaran</h3>
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
                                        <div class="row g-3 mt-2">
                                            <div class="col-md-6">
                                                <div class="form-check my-1">
                                                    <input class="form-check-input <?= ($validation->hasError('metode_bayar')) ? 'is-invalid' : ''; ?>" type="radio" name="metode_bayar" id="metode_bayar" value="Transfer" <?= old('metode_bayar') == 'Transfer' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="metode_bayar">
                                                        Transfer
                                                    </label>
                                                    <div class="is-invalid">
                                                        <?= $validation->getError('metode_bayar') ?>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check my-1">
                                                    <input class="form-check-input" type="radio" name="metode_bayar" id="metode_bayar" value="COD" <?= old('metode_bayar') == 'COD' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="metode_bayar">
                                                        COD (Hanya di UPI BUMSIL)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check my-1">
                                                    <input class="form-check-input" type="radio" name="metode_bayar" id="metode_bayar" value="Shopeepay" <?= old('metode_bayar') == 'Shopeepay' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="metode_bayar">
                                                        Shopeepay
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-check my-1">
                                                    <input class="form-check-input" type="radio" name="metode_bayar" id="kelas" value="Gopay" <?= old('kelas') == 'Gopay' ? 'checked' : '' ?> required>
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
                                    <h3>Pembayaran</h3>
                                    <!-- Metode Pembayaran -->
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check my-1">
                                            <input class="form-check-input <?= ($validation->hasError('pembayaran')) ? 'is-invalid' : ''; ?>" type="radio" id="pembayaran" name="pembayaran" value="Lunas" <?= old('pembayaran') == 'Lunas' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="pembayaran">
                                                Lunas
                                            </label>
                                            <div class="is-invalid">
                                                <?= $validation->getError('pembayaran') ?>
                                            </div>
                                        </div>
                                        <div class="form-check my-1">
                                            <input class="form-check-input" type="radio" id="pembayaran" name="pembayaran" value="Cicilan" <?= old('pembayaran') == 'Cicilan' ? 'checked' : '' ?> required>
                                            <label class="form-check-label fs-5" for="pembayaran">
                                                Cicilan (Min. DP setengah harga)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Upload Pembayaran -->
                            <div class="card mx-auto my-3" style="max-width: 100%;">
                                <div class="card-body m-3">
                                    <h3>Upload Bukti Pembayaran</h3>
                                    <p>Silahkan upload bukti pembayaran</p>
                                    <div class=" mb-3">
                                        <input type="file" class="form-control <?= ($validation->hasError('bukti')) ? 'is-invalid' : ''; ?>" id="bukti" name="bukti" required>
                                        <div id="help" class="form-text text-danger">*pastikan seluruh data terisi dengan benar!</div>
                                    </div>
                                    </form>
                                    <div class="collapse mt-4" id="collapseExample">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="btn-container">
                    <button id="prevBtn" class="btn btn-secondary" style="display: none;" data-bs-target="#carouselExample" data-bs-slide="prev">Previous</button>
                    <button id="nextBtn" class="btn register-button" data-bs-target="#carouselExample" data-bs-slide="next">Next</button>
                    <button id="submitBtn" class="btn register-button" style="display: none;" type="submit" form="registerForm">Submit</button>
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