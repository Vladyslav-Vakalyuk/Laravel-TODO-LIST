<?php

namespace App\DTO;
use App\Enum\TodoTask\Priority;

class DTONewTodoTask {
    private int $userId;
    private string $title;
    private string $description;
    private Priority $priority;
    private int $id;
    private ?int $todoListId;

    public function __construct(int $userId, string $title, string $description, Priority $priority, ?int $todoListId = null) {
        $this->userId = $userId;
        $this->title = $title;
        $this->priority = $priority;
        $this->description = $description;
        $this->todoListId = $todoListId ?? null;
    }

    /**
     * @return Priority
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

    /**
     * @param mixed $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTodoListId(): ?int
    {
        return $this->todoListId;
    }
}
