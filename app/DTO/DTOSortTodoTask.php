<?php

namespace App\DTO;
use App\Enum\TodoTask\Priority;
use App\Enum\TodoTask\Status;

class DTOSortTodoTask {
    private ?string $created_at;
    private ?string $priority;
    private ?string $updated_at;


    public function __construct(?string $created_at = null, ?string $priority = null, ?string $updated_at = null) {
        $this->created_at = $created_at;
        $this->priority = $priority;
        $this->updated_at = $updated_at;
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
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }


    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }
}
