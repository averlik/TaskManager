<?php

declare(strict_types=1);

namespace App;

use App\Enum\TaskStatus;

class TaskManager
{
    /** @var Task[] */
    private array $tasks = [];

    /**
     * Добавляет новую задачу
     */
    public function addTask(Task $task): void
    {
        $this->tasks[] = $task;
    }

    /**
     * Возвращает все задачи
     * @return Task[]
     */
    public function getTasks(): array
    {
        return array_values($this->tasks);
    }

    /**
     * Возвращает задачи с указанным статусом
     * @return Task[]
     */
    public function getTasksByStatus(TaskStatus $status): array
    {
        return array_filter(
            $this->tasks,
            fn(Task $task) => $task->getStatus() === $status
        );
    }

    /**
     * Находит задачу по ID
     * @param int $id Идентификатор задачи
     */
    public function findTaskById(int $id): ?Task
    {
        return $this->tasks[$id] ?? null;
    }
}