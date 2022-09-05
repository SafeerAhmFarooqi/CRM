<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'firstname' => 'Admin',
            'email' => 'admin@asadsohail.com',
            'password' => Hash::make('aaaaaaaa'),
        ]);
        $user->assignRole('Admin');
    }
}
