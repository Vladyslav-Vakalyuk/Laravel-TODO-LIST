<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTOGetTodoTask;
use Illuminate\Console\Command;

class SearchTodoList extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:search-todo-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search todo list';

    /**
     * Execute the console command.
     */
    public function handle(int $userId)
    {
        return new DTOGetTodoTask(
            $userId
        );
    }
}
