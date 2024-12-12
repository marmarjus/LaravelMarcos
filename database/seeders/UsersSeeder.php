<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Usuario A',
            'email' => 'usuarioA@example.com',
            'birthday' => '1990-05-15',
            'rol' => 'member',
            'password' => Hash::make('passwordA'),
            'remember_token' => Str::random(10),
        ]);
    }
}
