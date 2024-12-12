<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            'name' => 'Evento A',
            'description' => 'Descripción del Evento A.',
            'location' => 'Ubicación A',
            'date' => '2024-02-01',
            'hour' => '15:30:00',
            'type' => 'official',
            'tags' => 'etiqueta1, etiqueta2, etiqueta3',
            'visible' => true,
        ]);
    }
}
