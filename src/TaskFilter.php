<?php

declare(strict_types=1);

namespace App;

use App\Enum\TaskStatus;

class TaskFilter
{
    /**
     * Фильтрует задач по статусу
     * @param Task[] $tasks
     * @return Task[]
     */
    public static function filterByStatus(array $tasks, TaskStatus $status): array
    {
        return array_filter(
            $tasks,
            fn(Task $task) => $task->getStatus() === $status
        );
    }

    /**
     * Сортировка задач по дате создания - createdAt
     * @param Task[] $tasks
     * @return Task[]
     */
    public static function sortByDate(array $tasks, string $direction = 'asc'): array
    {
        usort(
            $tasks,
            function (Task $a, Task $b) use ($direction): int {
                $result = $a->getCreatedAt() <=> $b->getCreatedAt();
                return $direction === 'desc' ? -$result : $result;
            }
        );

        return $tasks;
    }
}
