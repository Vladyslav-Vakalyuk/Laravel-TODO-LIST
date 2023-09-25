<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTOTodoTask;
use App\Enum\TodoTask\Priority;
use Illuminate\Console\Command;

class PrepareUpdateTodoTaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prepare-update-task-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare update task';

    /**
     * Execute the console command.
     */
    public function handle(int $id, int $userId, string $title, string $description, string $priority, ?int $parentTaskId = null)
    {
        $priorityEnum = Priority::from($priority);

        return new DTOTodoTask(
            $id,
            $userId,
            $title,
            $description,
            $priorityEnum,
            $parentTaskId,
        );
    }
}
