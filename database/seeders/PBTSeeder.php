<?php

namespace Database\Seeders;

use App\Models\PBT;
use Illuminate\Database\Seeder;

class PBTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PBT::truncate();

        $csvFile = fopen(base_path("database/data/pbt_table.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                PBT::create([
                    "pbt_itegur_nama" => $data['0'],
                    "pbt_itegur_kod" => $data['1'],
                    "pbt_sispaa_nama" => $data['2'],
                    "sispaa_org_id" => $data['3'],
                    "nodus_sispaa" => $data['4'],
                    "db_sispaa_nama" => $data['5'],
                    "url_sispaa_acc" => $data['6'],
                    "negeri" => $data['7'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }

}
