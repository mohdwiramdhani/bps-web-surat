<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SifatSurat;
use Illuminate\Database\Seeder;
use App\Models\KlasifikasiSurat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        KlasifikasiSurat::create([
            'kode' => 'ADM',
            'klasifikasi' => 'Administrasi',
            'keterangan' => 'Jenis surat yang berkaitan dengan administrasi',
        ]);
        SifatSurat::create([
            'sifat' => 'Rahasia',
            'keterangan' => 'Berisifat Rahasia',
        ]);

    }
}
