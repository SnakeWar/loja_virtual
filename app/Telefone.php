<?php

namespace App;

use App\Http\Controllers\ClienteController;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'telefones';
    protected $fillable = ['telefone1', 'telefone2'];
    public $timestamps = false;

    public function distribuidores()
    {
        return $this->hasOne(Distribuidor::class, 'telefone_id', 'id');
    }
    public function lojas()
    {
        return $this->hasOne(Loja::class, 'telefone_id', 'id');
    }
    public function clientes()
    {
        return $this->hasOne(Cliente::class, 'telefone_id', 'id');
    }
}
