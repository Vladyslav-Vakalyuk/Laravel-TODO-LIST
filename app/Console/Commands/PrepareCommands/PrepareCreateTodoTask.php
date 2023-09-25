<?php

namespace App\Console\Commands\PrepareCommands;

use App\DTO\DTONewTodoTask;
use App\Enum\TodoTask\Priority;
use Illuminate\Console\Command;

class PrepareCreateTodoTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prepare-create-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare Create Task';

    /**
     * Execute the console command.
     */
    public function handle(int $userId, string $title, string $description, string $priority, ?int $parentTaskId = null)
    {
        $priorityEnum = Priority::from($priority);
        $parentTaskId = $parentTaskId ?? null;
        return new DTONewTodoTask(
            $userId,
            $title,
            $description,
            $priorityEnum,
            $parentTaskId,
        );
    }
}
