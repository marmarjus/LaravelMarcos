<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('players')->insert([
            'name' => 'Usuario A',
            'twitter' => 'https://twitter.com/usuarioA',
            'instagram' => 'https://instagram.com/usuarioA',
            'twitch' => 'https://twitch.tv/usuarioA',
            'title' => 'Título del Usuario A',
            'description' => 'Descripción del Usuario A.',
            'visible' => true,
        ]);
    }
}
