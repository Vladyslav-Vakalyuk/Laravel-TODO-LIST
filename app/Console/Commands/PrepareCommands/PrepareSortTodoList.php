<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTOFilterTodoTask;
use App\DTO\DTOGetTodoTask;
use App\DTO\DTOSortTodoTask;
use App\Enum\TodoTask\Priority;
use App\Enum\TodoTask\Status;
use Illuminate\Console\Command;

class PrepareSortTodoList extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sort-todo-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sort todo list';

    /**
     * Execute the console command.
     */
    public function handle(?string $createdAt, ?string $priority, ?string $updatedAt)
    {
        return new DTOSortTodoTask(
            $createdAt,
            $priority,
            $updatedAt
        );
    }
}
