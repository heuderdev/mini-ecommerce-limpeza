<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
                'remember_token' => Str::random(10),
            ]
        );

        User::factory(100)->create();
    }
}
