<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {//pra valer :D
        DB::table('categorias')->insert
        ([
            'nome' => "Amigo",
        ]);
        DB::table('categorias')->insert
        ([
            'nome' => "Vizinho",
        ]);
        DB::table('categorias')->insert
        ([
            'nome' => "Parente",
        ]);
        DB::table('categorias')->insert
        ([
            'nome' => "Cônjuge",
        ]);
    }
}
