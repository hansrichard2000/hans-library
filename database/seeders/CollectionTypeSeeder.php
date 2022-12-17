<?php

namespace Database\Seeders;

use App\Models\CollectionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CollectionType::create([
            'collectionTypeName' => 'Buku'
        ]);

        CollectionType::create([
            'collectionTypeName' => 'Audio Visual'
        ]);
    }
}
