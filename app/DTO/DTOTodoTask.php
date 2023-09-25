<?php

namespace App\DTO;
use App\Enum\TodoTask\Priority;

class DTOTodoTask {
    private $userId;
    private $title;
    private $description;
    private $priority;
    private $id;
    private ?int $todoListId;

    public function __construct(int $id, int $userId, string $title, string $description, Priority $priority, ?int $todoListId = null) {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->priority = $priority;
        $this->description = $description;
        $this->todoListId = $todoListId;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function getTodoListId(): ?int
    {
        return $this->todoListId;
    }
}
