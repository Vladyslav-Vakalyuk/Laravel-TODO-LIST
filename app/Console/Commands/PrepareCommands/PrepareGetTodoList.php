<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTOGetTodoTask;
use Illuminate\Console\Command;

class PrepareGetTodoList extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prepare-get-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare get task';

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
