<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('messages')->insert([
            'name' => 'Usuario A',
            'subject' => 'Asunto del mensaje A',
            'text' => 'Contenido del mensaje A.',
            'read' => false,
        ]);
    }
}
