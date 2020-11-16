<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'estado'
    ];
    
    public function items()
    {
        return $this->hasMany('App\Models\VendaItem');
    }
    public function getCriadoEmAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:m:i');
    }
    public function getTotalAttribute()
    {
        $total = $this->items->reduce(function ($carry, $item)
        {
            return $carry + $item->preco;
        });
        
        return number_format($total, 2, ',', '.');
    }
}
