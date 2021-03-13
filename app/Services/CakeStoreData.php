<?php

namespace App\Services;

use App\Models\Cake;

class CakeStoreData
{
    public static function run(array $data)
    {
        Cake::create([
            'nome' => $data['nome'],
            'sabor' => $data['sabor'],
            'preco' => $data['preco'],
            'quantidade' => $data['quantidade']
        ]);
    }
}
