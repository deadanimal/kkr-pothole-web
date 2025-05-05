<?php

namespace Database\Seeders;

use App\Models\Daerah;
use Illuminate\Database\Seeder;

class DaerahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Daerah::truncate();

        $csvFile = fopen(base_path("database/data/daerah.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Daerah::create([
                    "kod_daerah" => $data['0'],
                    "nama_daerah" => $data['1'],
                    "jkr_daerah" => $data['2'],
                    "negeri_id" => $data['3'],
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
