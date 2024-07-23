<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class MerchSeeder extends Seeder
{
    public function run()
    {
        // Inisialisasi Faker
        $faker = Factory::create();
    
        // Bersihkan tabel merch sebelum mengisi data baru
        $this->db->table('merch')->truncate();
    
        // Data contoh untuk tabel merch
        $data = [];
        for ($i = 0; $i < 60; $i++) {
            $data[] = [
                'email'                => $faker->unique()->safeEmail(),
                'nomor_telepon'        => $faker->phoneNumber(),
                'status_mahasiswa'     => $faker->randomElement(['Mahasiswa Aktif', 'Alumni']),
                'kelas'                => $faker->randomElement(['PILKOM A', 'PILKOM B', 'ILKOM C1', 'ILKOM C2']),
                'nama_lengkap'         => $faker->name(),
                'nim'                  => $faker->numerify('##########'),
                'produk_satuan'        => $faker->randomElement(['Jaket', 'Lanyard', 'Nametag', 'Mau Beli Bundle']),
                'paket_bundle'         => $faker->randomElement([
                    'Ternary Bundle (Jaket + Lanyard + Nametag)',
                    'Binary Bundle (Jaket + Lanyard)',
                    'Mau Beli Satuan'
                ]),
                'size_jaket'           => $faker->randomElement(['S', 'M', 'L', 'XL', '2XL', '3XL', '-']),
                'desain_lanyard'       => $faker->randomElement(['First Edition', 'Arunikarsa Edition', '-']),
                'nametag'              => $faker->word(),
                'catatan'              => $faker->sentence(),
                'metode_pembayaran'    => $faker->randomElement(['Transfer', 'COD', 'ShopeePay', 'Gopay']),
                'pembayaran'           => $faker->randomElement(['Lunas', 'Cicilan']),
                'bukti_pembayaran'     => $faker->imageUrl(),
                'created_at'           => $faker->dateTimeThisDecade()->format('Y-m-d H:i:s'),
                'updated_at'           => $faker->dateTimeThisDecade()->format('Y-m-d H:i:s'),
            ];
        }
    
        // Insert data ke tabel merch
        $this->db->table('merch')->insertBatch($data);
    }
    
}
