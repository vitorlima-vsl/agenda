<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TelefoneNumeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {//somente para teste
        $numeros = [
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999),
            "7999" . rand(6504128, 9999999)
        ];


        foreach ($numeros as $index => $numero) {
            $contatoId = floor($index / 2) + 1;
            DB::table('telefone_numeros')->insert([
            'numero' => $numero,
            'tipo' => rand(0, 1),
            'contato_id' => $contatoId,
            ]);
        }



    }
}
