<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            [
                "nome" => "Rio Branco",
                "estado" => "AC",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Maceió",
                "estado" => "AL",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Macapá",
                "estado" => "AP",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Manaus",
                "estado" => "AM",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Salvador",
                "estado" => "BA",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Fortaleza",
                "estado" => "CE",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Brasília",
                "estado" => "DF",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Vitória",
                "estado" => "ES",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Goiânia",
                "estado" => "GO",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "São Luís",
                "estado" => "MA",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Cuiabá",
                "estado" => "MT",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Campo Grande",
                "estado" => "MS",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Belo Horizonte",
                "estado" => "MG",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Belém",
                "estado" => "PA",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "João Pessoa",
                "estado" => "PB",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Curitiba",
                "estado" => "PR",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Recife",
                "estado" => "PE",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Teresina",
                "estado" => "PI",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Rio de Janeiro",
                "estado" => "RJ",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Natal",
                "estado" => "RN",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Porto Alegre",
                "estado" => "RS",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Porto Velho",
                "estado" => "RO",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Boa Vista",
                "estado" => "RR",
                "created_at" => Carbon::now()

            ],
            [
                "nome" => "Florianópolis",
                "estado" => "SC",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "São Paulo",
                "estado" => "SP",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Aracaju",
                "estado" => "SE",
                "created_at" => Carbon::now()
            ],
            [
                "nome" => "Palmas",
                "estado" => "TO",
                "created_at" => Carbon::now()
            ]
        ];

        DB::table('cidade')->insert($cities);
    }
}
