<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $senha = '123456';
        $senha_adm = Hash::make($senha);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => $senha_adm
        ]);
    }
}
