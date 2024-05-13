<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;


class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { //somente para teste
        DB::table('contatos')->insert
        ([
            'nome' => "paola",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "Paulo",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "Pedro",
        ]);
    }
}
