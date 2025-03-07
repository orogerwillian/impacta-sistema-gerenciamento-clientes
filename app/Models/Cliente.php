<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cliente extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'email',
        'data_nascimento',
        'estado_civil',
        'telefone',
        'cpf_cnpj',
        'tipo_pessoa',
        'status'
    ];

    public function Endereco(): HasOne
    {
        return $this->hasOne(Endereco::class);
    }
}
