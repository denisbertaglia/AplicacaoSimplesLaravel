<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'referencia',
        'nome',
        'preco'
    ];
    
    public $timestamps = false;
    
    protected $hidden = ['pivot'];

    public function fornecedores()
    {
        return $this->belongsToMany('App\Models\Fornecedor','produto_fornecedor');
    }
}
