<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    use HasFactory;

    protected $table = 'cake';

    protected $fillable = [
        'nome',
        'sabor',
        'preco',
        'quantidade',
    ];
}
