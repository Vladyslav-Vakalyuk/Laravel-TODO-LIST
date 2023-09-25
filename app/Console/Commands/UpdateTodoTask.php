<?php

namespace App\Console\Commands;

use App\DTO\DTONewTodoTask;
use App\DTO\DTOTodoTask;
use App\Services\TodoListService;
use Illuminate\Console\Command;

class UpdateTodoTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-todo-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command todo task';

    public function __construct(private TodoListService $todoListService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(DTOTodoTask $DTOTodoTask): DTOTodoTask
    {
       return $this->todoListService->updateTodoTask($DTOTodoTask);
    }
}
