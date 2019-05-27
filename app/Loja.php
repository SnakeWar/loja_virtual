<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{

    protected $primaryKey = 'id';
    protected $table = 'lojas';
    protected $fillable = ['filial', 'endereco_id'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id', 'id');
    }

    public function telefones()
    {
        return $this->belongsTo(Telefone::class, 'telefone_id', 'id');
    }
}
