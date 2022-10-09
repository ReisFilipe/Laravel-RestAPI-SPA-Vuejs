<?php

namespace Database\Seeders;

use App\Models\Estado as ModelsEstado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Estado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ModelsEstado::insert([
            [
                'id'  =>'1',
                'nome'  =>'Acre',
                'sigla'  =>'AC',
                'created_at' => now()
            ],
            [
                'id'  =>'2',
                'nome'  =>'Alagoas',
                'sigla'  =>'AL',
                'created_at' => now()
            ],
            [
                'id'  =>'3',
                'nome'  =>'Amazonas',
                'sigla'  =>'AM',
                'created_at' => now()
            ],
            [
                'id'  =>'4',
                'nome'  =>'Amapá',
                'sigla'  =>'AP',
                'created_at' => now()
            ],
            [
                'id'  =>'5',
                'nome'  =>'Bahia',
                'sigla'  =>'BA',
                'created_at' => now()
            ],
            [
                'id'  =>'6',
                'nome'  =>'Ceará',
                'sigla'  =>'CE',
                'created_at' => now()
            ],
            [
                'id'  =>'7',
                'nome'  =>'Distrito Federal',
                'sigla'  =>'DF',
                'created_at' => now()
            ],
            [
                'id'  =>'8',
                'nome'  =>'Espírito Santo',
                'sigla'  =>'ES',
                'created_at' => now()
            ],
            [
                'id'  =>'9',
                'nome'  =>'Goiás',
                'sigla'  =>'GO',
                'created_at' => now()
            ],
            [
                'id'  =>'10',
                'nome'  =>'Maranhão',
                'sigla'  =>'MA',
                'created_at' => now()
            ],
            [
                'id'  =>'11',
                'nome'  =>'Minas Gerais',
                'sigla'  =>'MG',
                'created_at' => now()
            ],
            [
                'id'  =>'12',
                'nome'  =>'Mato Grosso do Sul',
                'sigla'  =>'MS',
                'created_at' => now()
            ],
            [
                'id'  =>'13',
                'nome'  =>'Mato Grosso',
                'sigla'  =>'MT',
                'created_at' => now()
            ],
            [
                'id'  =>'14',
                'nome'  =>'Pará',
                'sigla'  =>'PA',
                'created_at' => now()
            ],
            [
                'id'  =>'15',
                'nome'  =>'Paraíba',
                'sigla'  =>'PB',
                'created_at' => now()
            ],
            [
                'id'  =>'16',
                'nome'  =>'Pernambuco',
                'sigla'  =>'PE',
                'created_at' => now()
            ],
            [
                'id'  =>'17',
                'nome'  =>'Piauí',
                'sigla'  =>'PI',
                'created_at' => now()
            ],
            [
                'id'  =>'18',
                'nome'  =>'Paraná',
                'sigla'  =>'PR',
                'created_at' => now()
            ],
            [
                'id'  =>'19',
                'nome'  =>'Rio de Janeiro',
                'sigla'  =>'RJ',
                'created_at' => now()
            ],
            [
                'id'  =>'20',
                'nome'  =>'Rio Grande do Norte',
                'sigla'  =>'RN',
                'created_at' => now()
            ],
            [
                'id'  =>'21',
                'nome'  =>'Rondônia',
                'sigla'  =>'RO',
                'created_at' => now()
            ],
            [
                'id'  =>'22',
                'nome'  =>'Roraima',
                'sigla'  =>'RR',
                'created_at' => now()
            ],
            [
                'id'  =>'23',
                'nome'  =>'Rio Grande do Sul',
                'sigla'  =>'RS',
                'created_at' => now()
            ],
            [
                'id'  =>'24',
                'nome'  =>'Santa Catarina',
                'sigla'  =>'SC',
                'created_at' => now()
            ],
            [
                'id'  =>'25',
                'nome'  =>'Sergipe',
                'sigla'  =>'SE',
                'created_at' => now()
            ],
            [
                'id'  =>'26',
                'nome'  =>'São Paulo',
                'sigla'  =>'SP',
                'created_at' => now()
            ],
            [
                'id'  =>'27',
                'nome'  =>'Tocantins',
                'sigla'  =>'TO',
                'created_at' => now()
            ]
        ]);
    }
}
