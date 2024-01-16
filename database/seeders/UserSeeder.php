<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'adam',
            'username' => 'adams',
            'password' => bcrypt('music098'),
            'email' => 'tirkeshdev@gmail.com',
            'is_admin'=> 1
        ]);
    }
}
