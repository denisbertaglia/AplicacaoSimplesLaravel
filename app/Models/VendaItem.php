<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendaItem extends Model
{
    use HasFactory;
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'venda_itens';
    
    protected $fillable = [
        'referencia',
        'nome',
        'preco',
        'fornecedor',
        'produto_id',
    ];
    
    public function venda()
    {
        return $this->belongsTo('App\Models\Venda');
    }
    
    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
