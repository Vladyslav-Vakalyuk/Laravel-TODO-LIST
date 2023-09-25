<?php

namespace App\Console\Commands;

use App\DTO\DTOSortTodoTask;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;

class SortTodoListCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sort-todo-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command sort todo list';

    /**
     * Execute the console command.
     */
    public function handle(Builder $queryTodoList, DTOSortTodoTask $filterTodoTaskDTO)
    {
        if($filterTodoTaskDTO->getPriority()){
            $queryTodoList->orderBy('priority', $this->getValueSort($filterTodoTaskDTO->getPriority()));
        }

        if($filterTodoTaskDTO->getCreatedAt()){
            $queryTodoList->orderBy('created_at', $this->getValueSort($filterTodoTaskDTO->getCreatedAt()));
        }

        if($filterTodoTaskDTO->getUpdatedAt()){
            $queryTodoList->orderBy('updated_at', $this->getValueSort($filterTodoTaskDTO->getUpdatedAt()));
        }
        return $filterTodoTaskDTO;
    }

    private function getValueSort(string $value): string
    {
        switch ($value) {
            case 'min':
                $sortValue = 'ASC';
                break;
            case 'max':
                $sortValue = 'DESC';
        }
        return $sortValue;
    }


}
