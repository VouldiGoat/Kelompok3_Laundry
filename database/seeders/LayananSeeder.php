<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'services_name' => 'Cuci & Lipat',
                'description' => 'Pakaian dicuci bersih, wangi, dan dilipat rapi siap simpan.',
                'price' => 7000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Cuci & Setrika',
                'description' => 'Paket komplit cuci bersih, harum, dan disetrika rapi licin.',
                'price' => 10000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Setrika Saja',
                'description' => 'Jasa setrika uap rapi untuk pakaian yang sudah dicuci.',
                'price' => 5000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Laundry Express (1 Hari)',
                'description' => 'Layanan kilat selesai dalam 24 jam untuk kebutuhan mendesak.',
                'price' => 15000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Cuci Selimut & Bed Cover',
                'description' => 'Pembersihan mendalam selimut tebal dan bed cover bebas debu & tungau.',
                'price' => 25000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Cuci Sepatu Premium',
                'description' => 'Deep clean sepatu berbagai material (canvas, suede, leather) seperti baru.',
                'price' => 30000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Cuci Jas / Blazer',
                'description' => 'Dry clean khusus jas dan pakaian formal agar serat kain terjaga.',
                'price' => 35000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Cuci Karpet',
                'description' => 'Pembersihan karpet tebal dengan mesin ekstraktor dan anti bakteri.',
                'price' => 40000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Cuci Gorden',
                'description' => 'Pencucian tirai dan gorden rumah hingga bersih dan wangi tahan lama.',
                'price' => 20000.00,
                'is_active' => true,
            ],
            [
                'services_name' => 'Cuci Boneka',
                'description' => 'Perawatan khusus boneka berbagai ukuran agar bersih dan higienis untuk anak.',
                'price' => 18000.00,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['services_name' => $service['services_name']],
                $service
            );
        }
    }
}

