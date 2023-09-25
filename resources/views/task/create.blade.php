<x-app-layout><div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h1>SORT</h1>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="get" action="{{ route('task.createTask') }}" class="mt-6 space-y-6">
                    <div>
                        <x-input-label for="priority" :value="__('Priority')"/>
                        <select name="sort_priority"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                            <option value="min">Min</option>
                            <option value="max">Max</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="sort_created_at" :value="__('Created at')"/>
                        <select name="sort_created_at"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                            <option value="min">Min</option>
                            <option value="max">Max</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="sort_updated_at" :value="__('Updated at')"/>
                        <select name="sort_updated_at"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                            <option value="min">Min</option>
                            <option value="max">Max</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Sort') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h1>FILTER</h1>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="get" action="{{ route('task.createTask') }}" class="mt-6 space-y-6">
                    <div>
                        <x-input-label for="task_text" :value="__('Title')"/>
                        <x-text-input id="task_text" name="title" type="text" value="{{$filter['title']}}"
                                      class="mt-1 block w-full"/>
                    </div>
                    <div>
                        <x-input-label for="priority" :value="__('Status')"/>
                        <select id="priority" name="status"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                            <option {{$filter['status'] == 0 ? 'selected':''}} value="0">Not completed</option>
                            <option {{$filter['status'] == 1 ? 'selected':''}} value="1">Completed</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="priority" :value="__('Priority')"/>
                        <select id="priority" name="priority"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                            <option {{$filter['priority'] == 1 ? 'selected':''}}  value="1">1</option>
                            <option {{$filter['priority'] == 2 ? 'selected':''}} value="2">2</option>
                            <option {{$filter['priority'] == 3 ? 'selected':''}} value="3">3</option>
                            <option {{$filter['priority'] == 4 ? 'selected':''}} value="4">4</option>
                            <option {{$filter['priority'] == 5 ? 'selected':''}} value="5">5</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Filter') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <h1>CREATE</h1>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form method="post" action="{{ route('task.create') }}" class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="task_text" :value="__('Title')"/>
                        <x-text-input id="task_text" name="title" type="text" class="mt-1 block w-full"/>
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('Description')"/>
                        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"/>
                    </div>
                    <div>
                        <x-input-label for="priority" :value="__('Priority')"/>
                        <select id="priority" name="priority"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="priority" :value="__('Parent Task')"/>
                        <select id="parent_task" name="parent_id"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                            <option value="">Empty</option>
                            @foreach ($todoLists as $todoList)
                                <option value="{{ $todoList->id }}">{{ $todoList->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Create') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        @php($width = 1200)
        @php($left = 0)
        @foreach ($todoLists as $todoList)
        <br>
            @if ($todoList->todo_list_id == null)
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"><div class="py-12">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="width: {{$width}}px; padding-left: {{$left}}px">
                            <h1>Task {{$todoList->id}}</h1>
                                <form method="post" action="{{ route('task.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$todoList->id}}">
                                    <div class="p-6 text-gray-900 dark:text-gray-100">
                                        <div>
                                            <x-input-label for="task_text_{{$todoList->id}}" :value="__('Title')"/>
                                            <x-text-input for="task_text_{{$todoList->id}}" value="{{$todoList->title}}"
                                                          name="title" type="text" class="mt-1 block w-full"/>
                                        </div>
                                        <div>
                                            <x-input-label for="description_{{$todoList->id}}"
                                                           :value="__('Description')"/>
                                            <x-text-input id="description_{{$todoList->id}}"
                                                          value="{{$todoList->description}}" name="description"
                                                          type="text" class="mt-1 block w-full"/>
                                        </div>
                                        <div>
                                            <x-input-label for="priority" :value="__('Priority')"/>
                                            <select id="priority" name="priority"
                                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
                                                <option {{$todoList->priority == 1 ? 'selected' : ''}} value="1">1
                                                </option>
                                                <option {{$todoList->priority == 2 ? 'selected' : ''}} value="2">2
                                                </option>
                                                <option {{$todoList->priority == 3 ? 'selected' : ''}}  value="3">3
                                                </option>
                                                <option {{$todoList->priority == 4 ? 'selected' : ''}}  value="4">4
                                                </option>
                                                <option {{$todoList->priority == 5 ? 'selected' : ''}}  value="5">5
                                                </option>
                                            </select>
                                        </div>
                                        <div>
                                            <x-input-label for="priority" :value="__('Status')"/>
                                            {{$todoList->status == 0 ? 'Not completed' : 'Completed'}}
                                        </div>
                                        <p>Created: {{ $todoList->created_at }}</p>
                                        <p>Completed: {{ $todoList->completed_at }}</p>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                                    </div>
                                </form>

                                @if ($todoList->status == 0)
                                    <form method="post" action="{{ route('task.destroy') }}" class="mt-6 space-y-6">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$todoList->id}}">
                                        <div class="flex items-center gap-4">
                                            <x-primary-button>{{ __('Delete') }}</x-primary-button>
                                        </div>
                                    </form>
                                @endif
                            @if ($todoList->childCompleted == $todoList->childCount && $todoList->status == 0)
                                <form method="post" action="{{ route('task.completed') }}" class="mt-6 space-y-6">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$todoList->id}}">
                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Completed') }}</x-primary-button>
                                    </div>
                                </form>
                            @endif
                                @include('task.child', ['todoListId'=>$todoList->id,'width'=>$width-100,'left'=>$left+100])

                        </div>
                        <br>
                    </div>

            </div></div>
            @endif
        @endforeach
    </div>
</div>
<h1>TODO LIST</h1>

</x-app-layout>
