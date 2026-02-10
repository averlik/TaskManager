<?php

declare(strict_types=1);

use App\Enum\TaskStatus;
use App\Task;
use App\TaskFilter;
use App\TaskManager;

require_once __DIR__ . '/vendor/autoload.php';

$manager = new TaskManager();

$task1 = new Task('Купить продукты', 'Молоко, хлеб, яйца');
$task2 = new Task('Записаться на курсы', 'Найти подходящие курсы по программированию');
$task3 = new Task('Забрать заказ', 'Пункт выдачи на Петра-Алексеева 19/2');

$manager->addTask($task1);
$manager->addTask($task2);
$manager->addTask($task3);

// Изменяем статус первой задачи
$task1->changeStatus(TaskStatus::IN_PROGRESS);

// Фильтруем задачи по статусу NEW через TaskFilter
$newTasks = TaskFilter::filterByStatus($manager->getTasks(), TaskStatus::NEW);

echo "Задачи NEW:\n";
foreach ($newTasks as $task) {
    echo $task . "\n";
}

// Сортировка всех задач по дате
$sorted = TaskFilter::sortByDate($manager->getTasks(), 'desc');

echo "\nОтсортированные задачи:\n";
foreach ($sorted as $task) {
    echo $task . "\n";
}

