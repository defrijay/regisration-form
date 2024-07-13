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
        /* background-color: #e0e0e0; */
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

<div class="container-fluid">
    <div class="row my-5 d-flex justify-content-center align-items-center">
        <div class="col-xl-10">
            <h2 class="text-center mb-4">
                <img src="<?= base_url('assets/images/form-title.svg') ?>" alt="" class="img-fluid form-title" alt="Formulir Pemesanan">
            </h2>

            <!-- Step buttons -->
            <div class="step-button-group mb-0">
                <button type="button" class="btn active" data-bs-target="#carouselExample" data-bs-slide-to="0" disabled>
                    <i class="fa-solid fa-1"></i> Data Diri
                </button>
                <button type="button" class="btn" data-bs-target="#carouselExample" data-bs-slide-to="1" disabled>
                    <i class="fa-solid fa-2"></i> Pemesanan Produk
                </button>
                <button type="button" class="btn" data-bs-target="#carouselExample" data-bs-slide-to="2" disabled>
                    <i class="fa-solid fa-3"></i> Pembayaran Produk
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
                                <form id="registerForm" action="<?= base_url('daftar/save') ?>" method="post" enctype="multipart/form-data" class="m-3">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label for="email" class="form-label fw-bold">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="wa" class="form-label fw-bold">Nomor WhatsApp</label>
                                                <input type="text" class="form-control" id="wa" name="wa" value="<?= old('wa') ?>" required>
                                            </div>

                                            <!-- Status Mahasiswa -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Status Mahasiswa</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        Mahasiswa Aktif
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        Alumni
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Data Kelas -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-bold">Kelas</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        PILKOM A
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        PILKOM B
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        ILKOM C1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                    <label class="form-check-label fs-5" for="kelas">
                                                        ILKOM C2
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>" required>
                                            </div>
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
                        <div class="card mx-auto my-3" style="max-width: 100%;">
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
                                    <p class="mt-3">Metode Pembayaran:</p>
                                    <div class="mb-4 align-items-center">
                                        <img src="<?= base_url('assets/images/bri.webp') ?>" alt="logo_bri" style="height: 30px; margin-right: 10px;">
                                        <strong> 0181-01-019449-53-6 </strong>(Alya Nurul Hanifah)
                                        <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('018101019449536')"><i class="far fa-copy"></i></button>
                                    </div>
                                    <div class="mb-4 align-items-center">
                                        <img src="<?= base_url('assets/images/Shopee.svg.png') ?>" alt="logo_sp" style="height: 30px; margin-right: 10px;">
                                        <strong> 085723639723 </strong>(alyanurulll)
                                        <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('085723639723')"><i class="far fa-copy"></i></button>
                                    </div>
                                    <div class="mb-4 align-items-center">
                                        <img src="<?= base_url('assets/images/dana.png') ?>" alt="logo_dana" style="height: 30px; margin-right: 10px;">
                                        <strong> 085723639723 </strong>(Dian Latifah)
                                        <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('085723639723')"><i class="far fa-copy"></i></button>
                                    </div>
                                    <div class="mb-4 align-items-center">
                                        <img src="<?= base_url('assets/images/gopay.png') ?>" alt="logo_gopay" style="height: 30px; margin-right: 10px;">
                                        <strong> 085723639723 </strong>(Alya Nurul Hanifah)
                                        <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('085723639723')"><i class="far fa-copy"></i></button>
                                    </div>
                                </div>
                               </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- Slide Pembayaran Produk -->
                    <div class="carousel-item">
                        <!-- Card Metode Pembayaran -->
                        <div class="card mx-auto my-3" style="max-width: 100%;">
                            <div class="card-body m-3">
                                <h3>Metode Pembayaran</h3>
                                <p>Silakan lakukan pembayaran dengan salah satu metode pembayaran berikut!</p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <img src="<?= base_url('assets/images/bri.webp') ?>" alt="logo_bri" style="height: 30px; margin-right: 10px;">
                                            <strong> 411801017635534 </strong>(Begi Sugara)
                                            <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('411801017635534')"><i class="far fa-copy"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <img src="<?= base_url('assets/images/Shopee.svg.png') ?>" alt="logo_sp" style="height: 30px; margin-right: 10px;">
                                            <strong> 0895630536755 </strong>(Dinda Natania)
                                            <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('0895630536755')"><i class="far fa-copy"></i></button>
                                        </div>
                                        <div class="col-md-12 mb-4">
                                            <img src="<?= base_url('assets/images/gopay.png') ?>" alt="logo_gopay" style="height: 30px; margin-right: 10px;">
                                            <strong> 0895630536755 </strong>(Dinda Natania)
                                            <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('0895630536755')"><i class="far fa-copy"></i></button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- Metode Pembayaran -->
                                        <div class="col-md-6 mb-3">
                                            <div class="form-check my-1">
                                                <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                <label class="form-check-label fs-5" for="kelas">
                                                    Transfer
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check my-1">
                                                <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                <label class="form-check-label fs-5" for="kelas">
                                                    COD (Hanya di UPI BUMSIL)
                                                </label>
                                            </div>
                                        </div>  
                                        <div class="col-md-6 mb-3">
                                            <div class="form-check my-1">
                                                <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                                <label class="form-check-label fs-5" for="kelas">
                                                    Shopeepay
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check my-1">
                                                <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
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
                                        <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                        <label class="form-check-label fs-5" for="kelas">
                                            Lunas
                                        </label>
                                    </div>
                                    <div class="form-check my-1">
                                        <input class="form-check-input" type="radio" name="ukuran" id="kelas" name="kelas" value="Kelas B" <?= old('kelas') == 'Kelas B' ? 'checked' : '' ?> required>
                                        <label class="form-check-label fs-5" for="kelas">
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
                                    <label for="bukti_pembayaran" class="form-label fw-bold">Upload File</label>
                                    <input type="file" class="form-control " id="bukti_pembayaran" name="bukti_pembayaran" required>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        Saya telah setuju dengan <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Syarat dan Ketentuan</a> yang dicantumkan
                                    </label>
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