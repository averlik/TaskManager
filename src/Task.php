<?php

declare(strict_types=1);

namespace App;

use DateTimeImmutable;
use InvalidArgumentException;
use App\Enum\TaskStatus;

class Task
{
    private static int $autoIncrement = 1;

    private int $id;
    private string $title;
    private string $description;
    private TaskStatus $status;
    private DateTimeImmutable $createdAt;

    /**
     * @param string $title Название задачи
     * @param string $description Описание задачи
     */
    public function __construct(
        string $title,
        string $description
    )
    {
        $this->id = self::$autoIncrement++;
        $this->title = $title;
        $this->description = $description;
        $this->status = TaskStatus::NEW;
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * Геттеры класса Task
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Метод changeStatus($newStatus) с проверкой корректности статуса
     * Enum обеспечивает безопасность типов и исключает неверные значения
     * @throws InvalidArgumentException
     */
    public function changeStatus(TaskStatus $newStatus): void
    {
        $this->status = $newStatus;
    }

    /**
     * Возвращает строковое представление
     * информации задачи
     */
    public function __toString(): string
    {
        return sprintf(
            "%s | %s | %s | %s",
            $this->title,
            $this->description,
            $this->status->label(),
            $this->createdAt->format('H:i d-m-Y')
        );
    }
}
