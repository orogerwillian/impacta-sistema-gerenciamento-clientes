<?php

namespace App\Models\Enums;

enum TipoPessoaEnum: string
{
    case FISICA = "Física";
    case JURIDICA = "Jurídica";

    public static function todos(): array {
        return array_map(fn($field) => $field->value, self::cases());
    }
}
