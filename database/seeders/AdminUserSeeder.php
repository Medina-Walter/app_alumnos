<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Ajusta según tu modelo

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // campo único
            [
                'nombre' => 'Admin',
                'apellido' => 'User',
                'password' => Hash::make('admin123'), // cambia por uno seguro
                'rol' => 'admin', // si tienes campo de rol
            ]
        );
    }
}
