<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTOFilterTodoTask;
use App\DTO\DTOGetTodoTask;
use App\Enum\TodoTask\Priority;
use App\Enum\TodoTask\Status;
use Illuminate\Console\Command;

class PrepareFilterTodoList extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:filter-todo-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare filter task';

    /**
     * Execute the console command.
     */
    public function handle(?string $title, ?string $priority, ?string $status)
    {
        return new DTOFilterTodoTask(
            $title,
            $priority,
            $status
        );
    }
}
