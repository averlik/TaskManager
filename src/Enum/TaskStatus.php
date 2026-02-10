<?php

namespace App\Enum;

enum TaskStatus: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::NEW => 'Новая задача',
            self::IN_PROGRESS => 'В процессе',
            self::COMPLETED => 'Завершена',
        };
    }
}