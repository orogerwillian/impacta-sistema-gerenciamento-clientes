<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    protected $fillable = [
        'cep',
        'rua',
        'numero',
        'bairro',
        'cidade_id',
        'complemento',
        'cliente_id'
    ];

    public function Cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function Cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }
}
