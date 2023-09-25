<?php

namespace App\Services;

use App\DTO\DTOCompletedTodoTask;
use App\DTO\DTODestroyTodoTask;
use App\DTO\DTOFilterTodoTask;
use App\DTO\DTOGetTodoTask;
use App\DTO\DTONewTodoTask;
use App\DTO\DTOTodoTask;
use App\Models\TodoList;

class TodoListService
{

    public function __construct()
    {

    }

    public function createTodoTask(DTONewTodoTask $DTO): DTOTodoTask
    {
        $todoTask = TodoList::create([
            'title' => $DTO->getTitle(),
            'description' => $DTO->getDescription(),
            'priority' => $DTO->getPriority(),
            'user_id' => $DTO->getUserId(),
            'status' => TodoList::NOT_COMPLETED,
            'todo_list_id' => $DTO->getTodoListId(),
        ]);

        $todoTask->save();

        return new DTOTodoTask(
            $todoTask->id,
            $todoTask->user_id,
            $todoTask->title,
            $todoTask->description,
            $todoTask->priority,
            $todoTask->status,
            $todoTask->todo_list_id,
        );
    }

    public function updateTodoTask(DTOTodoTask $DTO): DTOTodoTask
    {
        TodoList::where('id', $DTO->getId())
            ->update([
                'title' => $DTO->getTitle(),
                'description' => $DTO->getDescription(),
                'priority' => $DTO->getPriority(),
                'todo_list_id' => $DTO->getTodoListId(),
            ]);

        return $DTO;
    }

    public function deleteTodoTask(DTODestroyTodoTask $DTO): bool
    {
        return TodoList::where('id', $DTO->getId())
            ->delete();
    }

    public function completedTodoTask(DTOCompletedTodoTask $DTO): bool
    {
        return TodoList::where('id', $DTO->getId())
            ->update(
                [
                    'status' => TodoList::COMPLETED,
                    'completed_at' => date('Y-m-d', time()),
                ]
            );
    }

    public function getTodoList(DTOGetTodoTask $DTO)
    {
        return TodoList::where('todo_lists.user_id', $DTO->getUserId())
            ->addSelect(['childCompleted' => function ($query) {
                $query->selectRaw('count(TL.id)')
                    ->from('todo_lists as TL')
                    ->whereColumn('TL.todo_list_id', 'todo_lists.id')
                    ->where('TL.completed_at', '<>', null)
                    ->limit(1);
            }])
            ->addSelect(['childCount' => function ($query) {
                $query->selectRaw('count(TL.id)')
                    ->from('todo_lists as TL')
                    ->whereColumn('TL.todo_list_id', 'todo_lists.id')
                    ->limit(1);
            }]);
    }

}
