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
        DB::table('telefone_numeros')->insert([

            'numero' => "00000000",
            'tipo' => 0,
            'contato_id' => 1,

        ]);
        DB::table('telefone_numeros')->insert
        ([

            'numero' => "0000001",
            'tipo' => 0,
            'contato_id' => 2,

        ]);
        DB::table('telefone_numeros')->insert
        ([

            'numero' => "00000011",
            'tipo' => 0,
            'contato_id' => 3,

        ]);

    }
}
