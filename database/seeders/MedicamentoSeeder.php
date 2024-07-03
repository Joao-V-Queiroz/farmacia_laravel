<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicamentoSeeder extends Seeder
{
    public function run(): void
    {
        Medicamento::create([
            'nome' => 'Dipirona',
            'fabricante' => 'EMS',
            'preco' => '5.00',
            'quantidade' => 100,
            'descricao' => 'Analgésico e antipirético'
        ]);
    }
}
