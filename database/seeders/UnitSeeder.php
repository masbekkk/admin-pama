<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(__DIR__ . '/unit.csv', 'r');
        while (($data = fgetcsv($csvFile, 1000, ";")) !== FALSE) {

            Unit::create([
                "unit_name" => $data[1],
                "product_maker" => $data[2],
                "unit_type" => $data[3],
                "unit_code_number" => $data[4],
                "unit_serial_number" => $data[5],
                "engine_model" => $data[6],
                "engine_mnemonic" => $data[7],
                "engine_serial_model" => $data[8],
            ]);

        }
        fclose($csvFile);
    }
}
