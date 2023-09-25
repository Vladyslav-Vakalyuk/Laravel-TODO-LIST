<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTODestroyTodoTask;
use Illuminate\Console\Command;

class PrepareDestroyTodoTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prepare-destroy-todo-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare destroy task';

    /**
     * Execute the console command.
     */
    public function handle(int $id)
    {
       return new DTODestroyTodoTask($id);
    }
}
