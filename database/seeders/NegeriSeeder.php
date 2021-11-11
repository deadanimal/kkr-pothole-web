<?php

namespace Database\Seeders;

use App\Models\Negeri;
use Illuminate\Database\Seeder;

class NegeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negeri::truncate();

        $csvFile = fopen(base_path("database/data/negeri.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Negeri::create([
                    "kod_negeri" => $data['0'],
                    "nama_negeri" => $data['1']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
 }
