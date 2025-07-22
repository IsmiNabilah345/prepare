<?php

namespace Database\Seeders;

// use App\Models\User;
use App\Models\DropPoint;
use App\Models\Tracking;
use App\Models\Kurir;
use App\Models\Tarif;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        DropPoint::insert([
            [
                'nama' => 'Drop Point Medan Kota',
                'alamat' => 'Jl. Gatot Subroto No. 123',
                'kota' => 'Medan',
                'latitude' => 3.595196,
                'longitude' => 98.672223,
                'telepon' => '061-1234567',
                'jam_buka' => '08:00 - 17:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Drop Point Binjai',
                'alamat' => 'Jl. Jend. Sudirman No. 45',
                'kota' => 'Binjai',
                'latitude' => 3.599999,
                'longitude' => 98.500000,
                'telepon' => '061-7654321',
                'jam_buka' => '09:00 - 16:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Drop Point Tebing Tinggi',
                'alamat' => 'Jl. Imam Bonjol No. 10',
                'kota' => 'Tebing Tinggi',
                'latitude' => 3.330000,
                'longitude' => 99.160000,
                'telepon' => '0621-123456',
                'jam_buka' => '08:30 - 17:30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed kurirs
        $kurir1 = Kurir::create([
            'nama_kurir' => 'Fanzuri',
            'no_telp' => '08123456789',
        ]);
        $kurir2 = Kurir::create([
            'nama_kurir' => 'Fatimah',
            'no_telp' => '08123456788',
        ]);
        $kurir3 = Kurir::create([
            'nama_kurir' => 'Kurir Test',
            'no_telp' => '08123456787',
        ]);

        Tracking::insert([
            [
                'no_resi' => 'YKB-20240720-ABC123',
                'status' => 'Sedang dikirim',
                'id_kurir' => $kurir1->id_kurir,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(1),
            ],
            [
                'no_resi' => 'YKB-20240720-XYZ789',
                'status' => 'Terkirim',
                'id_kurir' => $kurir2->id_kurir,
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(2),
            ],
            [
                'no_resi' => 'YKB-20240720-TEST01',
                'status' => 'Belum dikirim',
                'id_kurir' => $kurir3->id_kurir,
                'created_at' => now()->subDays(1),
                'updated_at' => now(),
            ],
        ]);

        Tarif::insert([
            [
                'jenis' => 'reguler',
                'harga' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'express',
                'harga' => 20000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'same day',
                'harga' => 30000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
