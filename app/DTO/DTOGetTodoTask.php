<?php

namespace App\DTO;
use App\Enum\TodoTask\Priority;
use App\Enum\TodoTask\Status;

class DTOGetTodoTask {
    private ?int $userId;
    private ?string $title;
    private ?Priority $priority;
    private ?Status $status;


    public function __construct(int $userId, ?string $title = null, ?Priority $priority = null, ?Status $status = null) {
        $this->userId = $userId;
        $this->title = $title;
        $this->priority = $priority;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getPriority(): Priority
    {
        return $this->priority;
    }

    /**
     * @return mixed
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }
}
