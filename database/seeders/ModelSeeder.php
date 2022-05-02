<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [['22', 'Honda E'], ['22', 'HR-V'], ['22', 'CR-V'], ['62', 'Yaris'], ['62', 'GR Yaris'], ['62', 'Yaris Cross'], ['62', 'Corolla'], ['62', 'C-HR'], ['62', 'Camry'],
            ['62', 'Mirai'], ['62', 'bZ4X'], ['62', 'RAV4']
        ];

        foreach ($models as $model) {
            DB::table('models')->insert([
                'manufacturer_id' => $model[0],
                'name' => $model[1]
            ]);
        }
    }
}
