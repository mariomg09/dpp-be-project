<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('admin123');
        $user     = User::create([
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'admin@itdpp.com',
            'password' => $password,
        ]);

        $user->assignRole(['admin']);
    }
}
