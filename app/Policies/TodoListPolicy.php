<?php

namespace App\Policies;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoListPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TodoList $todoList): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TodoList $todoList): bool
    {
        //
    }

    /**
     * Determine whether the user can completed the model.
     */
    public function completed($todo,$d): bool
    {
        dd($d);
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TodoList $todoList): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TodoList $todoList): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TodoList $todoList): bool
    {
        //
    }
}
