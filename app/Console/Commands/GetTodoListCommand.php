<?php

namespace App\Console\Commands;

use App\DTO\DTOGetTodoTask;
use App\Services\TodoListService;
use Illuminate\Console\Command;

class GetTodoListCommand extends Command
{

    public function __construct(private TodoListService $todoListService)
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-todo-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command get todo list';

    /**
     * Execute the console command.
     */
    public function handle(DTOGetTodoTask $DTOGetTodoTask)
    {
        return $this->todoListService->getTodoList($DTOGetTodoTask);
    }
}
