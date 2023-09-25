<?php

namespace App\Http\Controllers;

use App\Console\Commands\CompletedTodoTask;
use App\Console\Commands\CreateTodoTask;
use App\Console\Commands\DestroyTodoTask;
use App\Console\Commands\FilterTodoListCommand;
use App\Console\Commands\GetTodoListCommand;
use App\Console\Commands\PrepareCommands\PrepareCompletedTodoTask;
use App\Console\Commands\PrepareCommands\PrepareCreateTodoTask;
use App\Console\Commands\PrepareCommands\PrepareDestroyTodoTask;
use App\Console\Commands\PrepareCommands\PrepareFilterTodoList;
use App\Console\Commands\PrepareCommands\PrepareGetTodoList;
use App\Console\Commands\PrepareCommands\PrepareSortTodoList;
use App\Console\Commands\PrepareCommands\PrepareUpdateTodoTaskCommand;
use App\Console\Commands\SortTodoListCommand;
use App\Console\Commands\UpdateTodoTask;
use App\Http\Requests\CompletedTodoListRequest;
use App\Http\Requests\DestroyTodoListRequest;
use App\Http\Requests\StoreTodoListRequest;
use App\Http\Requests\UpdateTodoListRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function createTask(
        FormRequest $request,
        PrepareGetTodoList $prepareGetTodoList,
        GetTodoListCommand $getTodoList,
        PrepareFilterTodoList $prepareFilterTodoList,
        FilterTodoListCommand $filterTodoListCommand,
        PrepareSortTodoList $prepareSortTodoList,
        SortTodoListCommand $sortTodoListCommand,
    )
    {
        $todoLists = $getTodoList->handle(
            $prepareGetTodoList->handle(Auth::user()->id)
        );

        $filterTodoListCommand->handle(
            $todoLists,
            $prepareFilterTodoList->handle(
                $request->query->get('title'),
                $request->query->get('priority'),
                $request->query->get('status'),
            )
        );

        $sortTodoListCommand->handle(
            $todoLists,
            $prepareSortTodoList->handle(
                $request->query->get('sort_created_at'),
                $request->query->get('sort_priority'),
                $request->query->get('sort_updated_at'),
            )
        );

        return view('task.create', [
            'todoLists' => $todoLists->get(),
            'filter' => [
                'title' => $request->query->get('title'),
                'priority' => $request->query->get('priority'),
                'status' => $request->query->get('status'),
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(
        StoreTodoListRequest $request,
        CreateTodoTask $createTodoTask,
        PrepareCreateTodoTask $prepareCreateTodoTaskCommand,
    )
    {
        if ($request->isMethod('POST')) {
            $createTodoTask->handle(
                $prepareCreateTodoTaskCommand->handle(
                    Auth::user()->id,
                    $request->request->get('title'),
                    $request->request->get('description'),
                    $request->request->get('priority'),
                    $request->request->get('parent_id'),
                )
            );
        }

       return redirect('/dashboard/');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTodoListRequest $request,
        UpdateTodoTask $updateTodoTask,
        PrepareUpdateTodoTaskCommand $prepareUpdateTodoTaskCommand,
    )
    {
        if ($request->isMethod('POST')) {
            $updateTodoTask->handle(
                $prepareUpdateTodoTaskCommand->handle(
                    $request->request->get('id'),
                    Auth::user()->id,
                    $request->request->get('title'),
                    $request->request->get('description'),
                    $request->request->get('priority'),
                    null,
                )
            );
        }

        return redirect('/dashboard/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        DestroyTodoListRequest $request,
        PrepareDestroyTodoTask $prepareDestroyTodoTask,
        DestroyTodoTask $destroyTodoTask
    )
    {
        $destroyTodoTask->handle(
            $prepareDestroyTodoTask->handle(
                $request->request->get('id'),
            )
        );

        return redirect('/dashboard/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function completed(
        CompletedTodoListRequest $request,
        PrepareCompletedTodoTask $prepareCompletedTodoTask,
        CompletedTodoTask $completedTodoTask
    )
    {
        $completedTodoTask->handle(
            $prepareCompletedTodoTask->handle(
                $request->request->get('id'),
            )
        );

        return redirect('/dashboard/');
    }
}
