<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
//    use HasFactory;
    protected $table = 'fornecedores'; // usado para quando o nome da tabela não é o plural do nome do model
    protected $fillable = ['nome', 'site', 'uf', 'email']; // usado para quando o nome da tabela não é o plural do nome do model
}
