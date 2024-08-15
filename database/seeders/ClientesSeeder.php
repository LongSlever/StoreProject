<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
        [
        'nome' => "Vitor Augusto",
        'email' => "vaugusto.pereira17@gmail.com",
        'endereco' => "Rua Cosmo José da Silva",
        'logradouro' => "Casa 2",
        'cep' => "08285300",
        'bairro' => "Cidade Lider"
        ]
        );
    }
}
