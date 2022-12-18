<?php

namespace Database\Seeders;

use App\Models\CollectionStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CollectionStatus::create([
           'collectionStatusName' => 'Tersedia'
        ]);

        CollectionStatus::create([
            'collectionStatusName' => 'Dipinjam'
        ]);

        CollectionStatus::create([
            'collectionStatusName' => 'Diarsipkan'
        ]);
    }
}
