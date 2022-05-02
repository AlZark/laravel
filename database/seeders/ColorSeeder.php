<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = ['Red', 'Brown', 'White', 'Green', 'Black', 'Silver', 'Grey', 'Blue', 'Yellow', 'Pink', 'Orange', 'Gold'];

        foreach ($colors as $color) {
            DB::table('colors')->insert([
                'name' => $color
            ]);
        }
    }
}
