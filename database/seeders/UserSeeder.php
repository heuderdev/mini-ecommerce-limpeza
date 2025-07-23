<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'heuderdev@gmail.com'], // Condição para encontrar ou criar
            [
                'name' => 'Admin User',
                'password' => Hash::make('12345678'), // Senha padrão 'password'
                'email_verified_at' => now(), // Marca o email como verificado
            ]
        );

        User::factory(100)->create();
    }
}
