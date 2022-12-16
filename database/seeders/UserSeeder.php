<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Hans Richard',
            'username' => 'hansrich2000',
            'email'=>'hansrichard2000@yahoo.com',
            'phone'=>'08123456789',
            'address'=>'Citraland',
            'roleID'=>1,
            'is_active'=>'1',
            'password'=>bcrypt('12345678')
        ]);

        User::factory(3)->create();
    }
}