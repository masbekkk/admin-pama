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
                "stock_code_vdc" => $data[0],
                "stock_code_vdc_claim" => $data[1],
                "picture" => "vdc_master_picture/2024-01-2109:44_icon.png",
                "item_name" => $data[2],
                "mnemonic" => $data[3],
                "part_number" => $data[4],
                "type_of_item" => "lampu",
                "supplier" => $data[5],
                "supplier_address" => $data[5],
                "uoi" => $data[6],
                "price_damage_core" => getClearNumberFromStringCurrency($data[7]),
                "price_product_genuine" => getClearNumberFromStringCurrency($data[8]),
                "price_total" => getClearNumberFromStringCurrency($data[9]),
                "warranty_time_guarantee" => $data[10],
                "claim_method" => $data[11],
                "claim_document" => "vdc_master_claim_document/2024-01-2109:38_Surat Jalan No. Referensi_ 00211-INV (3).pdf",
            ]);

        }
        fclose($csvFile);
    }
}
