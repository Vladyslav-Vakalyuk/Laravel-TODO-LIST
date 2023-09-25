<?php

namespace App\DTO;
use App\Enum\TodoTask\Priority;
use App\Enum\TodoTask\Status;

class DTOFilterTodoTask {
    private ?string $title;
    private ?string $priority;
    private ?string $status;


    public function __construct(?string $title = null, ?string $priority = null, ?string $status = null) {
        $this->title = $title;
        $this->priority = $priority;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getPriority(): ?string
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


    public function getStatus(): ?string
    {
        return $this->status;
    }
}
