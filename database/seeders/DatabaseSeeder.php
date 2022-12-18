<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CollectionStatus;
use App\Models\CollectionType;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Model::unguard();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CollectionTypeSeeder::class,
            CollectionStatusSeeder::class,
            CollectionSeeder::class,
        ]);

        Model::reguard();
    }
}
