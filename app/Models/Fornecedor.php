<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fornecedores';
    
    protected $fillable = [
        'nome'
    ];
    
    public $timestamps = false;
    
    protected $hidden = ['pivot','id'];

    public function produto()
    {
        return $this->belongsToMany('App\Models\Produto','produto_fornecedor');
    }
    
}
