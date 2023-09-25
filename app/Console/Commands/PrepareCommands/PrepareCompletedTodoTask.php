<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTOCompletedTodoTask;
use App\DTO\DTODestroyTodoTask;
use Illuminate\Console\Command;

class PrepareCompletedTodoTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prepare-completed-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare completed task';

    /**
     * Execute the console command.
     */
    public function handle(int $id)
    {
       return new DTOCompletedTodoTask($id);
    }
}
