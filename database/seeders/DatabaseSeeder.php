<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $senha = '123456';
        $senha_adm = Hash::make($senha);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => $senha_adm
        ]);
    }
}
