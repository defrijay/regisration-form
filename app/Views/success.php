<?= $this->extend('layout/masterForm') ?>

<?= $this->section('content') ?>

<style>
    .success-animation {
        width: 100px;
        height: 100px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        animation: bounce 4s infinite;
    }

    @keyframes grow-rotate {
        0% {
            transform: scale(0) rotate(0deg);
        }
        50% {
            transform: scale(1.1) rotate(180deg);
        }
        100% {
            transform: scale(1) rotate(360deg);
        }
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-30px);
        }
        60% {
            transform: translateY(-15px);
        }
    }

    .circle-bg {
        position: absolute;
        animation: grow-rotate 2s ease-out forwards, bounce 2s infinite 1s;
    }

    .checkmark {
        position: absolute;
        width: 60px;
        height: 60px;
        animation: grow-rotate 1s ease-out forwards, bounce 2s infinite 1s;
    }

    .container-full-height {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        width: 30rem;
        text-align: center;
    }

    .card-header {
        background: none;
        border-bottom: none;
    }

    .card-body {
        margin: 3rem;
    }

    .register-button {
        font-weight: bold;
    }
</style>

<div class="container container-full-height">
    <div class="row">
        <div class="col d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-header mt-5">
                <?php foreach ($merchs as $merch) :?>
                    <h4 class="card-title fw-bold">Selamat! <strong><?= $merch['nama_lengkap'] ?></strong></h4>
                    <?php endforeach; ?>
                    <h4 class="card-title fw-bold">Pemesanan Berhasil!</h4>
                </div>
                <div class="card-body">
                    <div class="success-animation mx-auto">
                        <svg class="circle-bg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle cx="26" cy="26" r="25" fill="#4CAF50"/>
                        </svg>
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <path fill="none" stroke="#FFF" stroke-width="5" d="M14 27l7 7 16-16"/>
                        </svg>
                    </div>
                    <div class="keterangan-sukses">
                        <p class="card-text my-3">Terima Kasih telah memesan KEMAKOM Merchandise! Simpan nomor pemesananmu apabila terjadi kendala atau masalah dalam proses pemesanan.</p>
                        <!-- <a href="https://chat.whatsapp.com/Id0nlNvtZoAGrm9RqIAwTm" target="_blank" class="btn btn-success">
                            <i class="bi bi-whatsapp"></i>
                            Bergabung ke Grup
                        </a> -->
                    </div>
                    <div class="no-registrasi d-flex align-items-center text-center">
                        <p class="card-text mb-0 text-center">Nomor Pemesanan : <strong>M212123</strong></p>
                        <button class="btn btn-sm btn-outline-secondary ms-2" type="button" onclick="copyToClipboard('0895630536755')">
                            <i class="far fa-copy"></i>
                        </button>
                    </div><br>

                    <a href="<?= base_url('/')?>" class="btn btn-outline-success">
                        Kembali Ke Halaman Produk
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    function copyToClipboard() {
        // Ambil elemen dengan ID 'no-registrasi-text'
        var copyText = document.getElementById("no-registrasi-text").textContent;

        // Buat elemen textarea untuk menyalin teks ke clipboard
        var textArea = document.createElement("textarea");
        textArea.value = copyText;
        document.body.appendChild(textArea);

        // Pilih dan salin teks
        textArea.select();
        document.execCommand("copy");

        // Hapus elemen textarea setelah menyalin
        document.body.removeChild(textArea);

        // Opsional: Tampilkan pesan bahwa teks telah disalin
        alert("Nomor registrasi telah disalin ke clipboard!");
    }
</script> -->


<?= $this->endSection() ?>
