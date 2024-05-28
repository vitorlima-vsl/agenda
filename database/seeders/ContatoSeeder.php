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
            'nome' => "Tercio",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "Paulo",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "Ricardo",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "Rodrigo",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "John",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "Michael",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "David",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "Robert",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "William",
        ]);
        DB::table('contatos')->insert
        ([
            'nome' => "James",
        ]);
    }
}
