<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'endereco';
    protected $fillable = ['logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf'];
    public $timestamps = false;

    public function distribuidores()
    {
        return $this->hasOne(Distribuidor::class, 'endereco_id', 'id');
    }
}
