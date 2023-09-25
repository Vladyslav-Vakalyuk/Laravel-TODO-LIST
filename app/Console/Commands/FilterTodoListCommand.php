<?php

namespace App\Console\Commands;

use App\DTO\DTOFilterTodoTask;
use App\DTO\DTOGetTodoTask;
use App\Models\TodoList;
use App\Services\TodoListService;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class FilterTodoListCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:filter-todo-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command filter todo list';

    /**
     * Execute the console command.
     */
    public function handle(Builder $queryTodoList, DTOFilterTodoTask $filterTodoTaskDTO)
    {
        if($filterTodoTaskDTO->getTitle()){
            $queryTodoList->where('title', 'like', '%'.$filterTodoTaskDTO->getTitle().'%');
        }

        if($filterTodoTaskDTO->getPriority()){
            $queryTodoList->where('priority', $filterTodoTaskDTO->getPriority());
        }

        if($filterTodoTaskDTO->getStatus()){
            $queryTodoList->where('priority', $filterTodoTaskDTO->getStatus());
        }
        return $filterTodoTaskDTO;
    }
}
