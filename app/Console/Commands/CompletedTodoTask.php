<?php

namespace App\Console\Commands;

use App\DTO\DTOCompletedTodoTask;
use App\DTO\DTODestroyTodoTask;
use App\DTO\DTONewTodoTask;
use App\DTO\DTOTodoTask;
use App\Services\TodoListService;
use Illuminate\Console\Command;

class CompletedTodoTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-todo-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Completed todo task';

    public function __construct(private TodoListService $todoListService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(DTOCompletedTodoTask $DTOTodoTask)
    {
       return $this->todoListService->completedTodoTask($DTOTodoTask);
    }
}
