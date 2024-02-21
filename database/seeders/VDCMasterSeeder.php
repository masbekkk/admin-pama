<?php

namespace Database\Seeders;

use App\Models\VDCMaster;
use Illuminate\Database\Seeder;

class VDCMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(__DIR__ . '/vdc_master.csv', 'r');
        while (($data = fgetcsv($csvFile, 1000, ";")) !== FALSE) {

            VDCMaster::create([
                "stock_code_vdc" => $data[1],
                "stock_code_vdc_claim" => $data[2],
                // "picture" => "storage/vdc_master_pictures/EqCTFC3ph6UlXhInX7bA6WSVKkEUk28GSuxYlaq1.webp",
                "item_name" => $data[4],
                "mnemonic" => $data[5],
                "part_number" => $data[6],
                "type_of_item" => $data[7],
                "supplier" => $data[8],
                "supplier_address" => $data[9],
                "uoi" => $data[10],
                "price_damage_core" => getClearNumberFromStringCurrency($data[11]),
                "price_product_genuine" => getClearNumberFromStringCurrency($data[12]),
                "price_total" => getClearNumberFromStringCurrency($data[13]),
                "warranty_time_guarantee" => $data[14] . 'years',
                "claim_method" => $data[15],
                // "claim_document" => "storage/vdc_claim_claim_documents/rXJm8HiWhgTgdbFaZfFhf50zgHNgnSQqy93QkFQH.pdf",
            ]);

        }
        fclose($csvFile);
    }
}
