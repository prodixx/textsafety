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
        $users = [
            ['name' => 'Catalin Prodan', 'email' => 'catalin.prodan@newpixel.ro', 'password' => 'password'],
        ];

        foreach ($users as $cont) {
            $user = User::create([
                'name'     => $cont['name'],
                'email'    => $cont['email'],
                'password' => Hash::make($cont['password']),
            ]);
        }
    }
}
