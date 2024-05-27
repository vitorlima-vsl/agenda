<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;



class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { //somente para teste
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Flores',
            'cidade' => 'Sao Paulo',
            'numero' => '123',
            'contato_id' => 1,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Tesouras',
            'cidade' => 'Sao Paulo',
            'numero' => '122',
            'contato_id' => 2,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Tedras',
            'cidade' => 'Sao Cristovao',
            'numero' => '121',
            'contato_id' => 3,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Flores',
            'cidade' => 'Sao Paulo',
            'numero' => '123',
            'contato_id' => 4,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Tesouras',
            'cidade' => 'Sao Paulo',
            'numero' => '122',
            'contato_id' => 5,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Tedras',
            'cidade' => 'Sao Cristovao',
            'numero' => '121',
            'contato_id' => 6,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Flores',
            'cidade' => 'Sao Paulo',
            'numero' => '123',
            'contato_id' => 7,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Tesouras',
            'cidade' => 'Sao Paulo',
            'numero' => '122',
            'contato_id' => 8,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Tedras',
            'cidade' => 'Sao Cristovao',
            'numero' => '121',
            'contato_id' => 9,

        ]);
        DB::table('enderecos')->insert([
            'rua' => 'Rua das Flores',
            'cidade' => 'Sao Paulo',
            'numero' => '123',
            'contato_id' => 10,

        ]);
    }
}
