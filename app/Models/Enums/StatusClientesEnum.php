<?php

namespace App\Models\Enums;

enum StatusClientesEnum: string
{
    case LIBERADO = "Liberado";
    case BLOQUEADO = "Bloqueado";

    public static function todos(): array {
        return array_map(fn($field) => $field->value, self::cases());
    }

}
