<!-- app/Views/merch/create.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Merch</title>
</head>
<body>
    <h1>Create Merch</h1>
    
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php elseif(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    
    <?= \Config\Services::validation()->listErrors() ?>
    
    <form action="<?= base_url('merch/store') ?>" method="post" enctype="multipart/form-data">
        <label>Email:</label>
        <input type="text" name="email" value="<?= old('email') ?>"><br>
        
        <label>Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" value="<?= old('nomor_telepon') ?>"><br>
        
        <label>Status Mahasiswa:</label>
        <input type="radio" name="status_mahasiswa" value="Mahasiswa Aktif" <?= old('status_mahasiswa') == 'Mahasiswa Aktif' ? 'checked' : '' ?>> Mahasiswa Aktif
        <input type="radio" name="status_mahasiswa" value="Alumni" <?= old('status_mahasiswa') == 'Alumni' ? 'checked' : '' ?>> Alumni<br>
        
        <label>Kelas:</label>
        <input type="radio" name="kelas" value="PILKOM A" <?= old('kelas') == 'PILKOM A' ? 'checked' : '' ?>> PILKOM A
        <input type="radio" name="kelas" value="PILKOM B" <?= old('kelas') == 'PILKOM B' ? 'checked' : '' ?>> PILKOM B
        <input type="radio" name="kelas" value="ILKOM C1" <?= old('kelas') == 'ILKOM C1' ? 'checked' : '' ?>> ILKOM C1
        <input type="radio" name="kelas" value="ILKOM C2" <?= old('kelas') == 'ILKOM C2' ? 'checked' : '' ?>> ILKOM C2<br>
        
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="<?= old('nama_lengkap') ?>"><br>
        
        <label>NIM:</label>
        <input type="text" name="nim" value="<?= old('nim') ?>"><br>
        
        <label>Produk Satuan:</label>
        <input type="checkbox" name="produk_satuan[]" value="Jaket" <?= in_array('Jaket', old('produk_satuan', [])) ? 'checked' : '' ?>> Jaket
        <input type="checkbox" name="produk_satuan[]" value="Lanyard" <?= in_array('Lanyard', old('produk_satuan', [])) ? 'checked' : '' ?>> Lanyard
        <input type="checkbox" name="produk_satuan[]" value="Nametag" <?= in_array('Nametag', old('produk_satuan', [])) ? 'checked' : '' ?>> Nametag
        <input type="checkbox" name="produk_satuan[]" value="Mau Beli Bundle" <?= in_array('Mau Beli Bundle', old('produk_satuan', [])) ? 'checked' : '' ?>> Mau Beli Bundle<br>
        
        <label>Paket Bundle:</label>
        <input type="radio" name="paket_bundle" value="Ternary Bundle (Jaket + Lanyard + Nametag)" <?= old('paket_bundle') == 'Ternary Bundle (Jaket + Lanyard + Nametag)' ? 'checked' : '' ?>> Ternary Bundle (Jaket + Lanyard + Nametag)
        <input type="radio" name="paket_bundle" value="Binary Bundle (Jaket + Lanyard)" <?= old('paket_bundle') == 'Binary Bundle (Jaket + Lanyard)' ? 'checked' : '' ?>> Binary Bundle (Jaket + Lanyard)
        <input type="radio" name="paket_bundle" value="Mau Beli Satuan" <?= old('paket_bundle') == 'Mau Beli Satuan' ? 'checked' : '' ?>> Mau Beli Satuan<br>
        
        <label>Size Jaket:</label>
        <input type="radio" name="size_jaket" value="S" <?= old('size_jaket') == 'S' ? 'checked' : '' ?>> S
        <input type="radio" name="size_jaket" value="M" <?= old('size_jaket') == 'M' ? 'checked' : '' ?>> M
        <input type="radio" name="size_jaket" value="L" <?= old('size_jaket') == 'L' ? 'checked' : '' ?>> L
        <input type="radio" name="size_jaket" value="XL" <?= old('size_jaket') == 'XL' ? 'checked' : '' ?>> XL
        <input type="radio" name="size_jaket" value="2XL" <?= old('size_jaket') == '2XL' ? 'checked' : '' ?>> 2XL
        <input type="radio" name="size_jaket" value="3XL" <?= old('size_jaket') == '3XL' ? 'checked' : '' ?>> 3XL
        <input type="radio" name="size_jaket" value="-" <?= old('size_jaket') == '-' ? 'checked' : '' ?>> -<br>
        
        <label>Desain Lanyard:</label>
        <input type="radio" name="desain_lanyard" value="First Edition" <?= old('desain_lanyard') == 'First Edition' ? 'checked' : '' ?>> First Edition
        <input type="radio" name="desain_lanyard" value="Arunikarsa Edition" <?= old('desain_lanyard') == 'Arunikarsa Edition' ? 'checked' : '' ?>> Arunikarsa Edition
        <input type="radio" name="desain_lanyard" value="-" <?= old('desain_lanyard') == '-' ? 'checked' : '' ?>> -<br>
        
        <label>Nametag:</label>
        <input type="text" name="nametag" value="<?= old('nametag') ?>"><br>
        
        <label>Catatan:</label>
        <input type="text" name="catatan" value="<?= old('catatan') ?>"><br>
        
        <label>Metode Pembayaran:</label>
        <input type="radio" name="metode_pembayaran" value="Transfer" <?= old('metode_pembayaran') == 'Transfer' ? 'checked' : '' ?>> Transfer
        <input type="radio" name="metode_pembayaran" value="COD" <?= old('metode_pembayaran') == 'COD' ? 'checked' : '' ?>> COD
        <input type="radio" name="metode_pembayaran" value="ShopeePay" <?= old('metode_pembayaran') == 'ShopeePay' ? 'checked' : '' ?>> ShopeePay
        <input type="radio" name="metode_pembayaran" value="Gopay" <?= old('metode_pembayaran') == 'Gopay' ? 'checked' : '' ?>> Gopay<br>
        
        <label>Pembayaran:</label>
        <input type="radio" name="pembayaran" value="Lunas" <?= old('pembayaran') == 'Lunas' ? 'checked' : '' ?>> Lunas
        <input type="radio" name="pembayaran" value="Cicilan" <?= old('pembayaran') == 'Cicilan' ? 'checked' : '' ?>> Cicilan<br>
        
        <label>Bukti Pembayaran:</label>
        <input type="file" name="bukti_pembayaran"><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
