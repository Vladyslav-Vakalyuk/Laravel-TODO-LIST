<?php

namespace App\Console\Commands;

use App\DTO\DTODestroyTodoTask;
use App\DTO\DTONewTodoTask;
use App\DTO\DTOTodoTask;
use App\Services\TodoListService;
use Illuminate\Console\Command;

class DestroyTodoTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:destroy-todo-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Destroy todo task';

    public function __construct(private TodoListService $todoListService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(DTODestroyTodoTask $DTOTodoTask)
    {
       return $this->todoListService->deleteTodoTask($DTOTodoTask);
    }
}
