@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-3">
        <div class="flex justify-between items-end w-full">
            <p class="text-gray-600 text-sm">
                <a href="/projects" class="text-blue-500"> My Projects </a>/ {{ $project->title }}
            </p>
            <a href="/projects/create" class="bg-blue-400 rounded-full shadow py-2 px-4 text-white text-sm">New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">

            <div class="lg:w-3/4 px-3 mb-8">
                <div class="mb-6">
                    <h2 class="text-gray-600 text-lg mb-3">Tasks</h2>
                    {{-- Tasks --}}
                    @foreach($project->tasks as $task)
                        <div class="card mb-3">
                            <form action="{{ $task->path()}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="flex items-center">
                                    <input type="text" name="body" value="{{ $task->body }}" class="w-full {{ $task->completed ? 'text-gray-500' : ''}}">
                                    <input name="completed" type="checkbox" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                                </div>
                            </form>
                        </div>
                    @endforeach

                    <div class="card mb-3">
                        <form action="{{ $project->path() . '/tasks'}}" method="POST">
                            @csrf
                            <input type="text" class="w-full" name="body" placeholder="Add a new task.">
                        </form>
                    </div>
                </div>

                <div>
                    <h2 class="text-gray-600 text-lg mb-3">General Notes</h2>
                    <textarea class="card w-full" rows="6">Lorem Ipsum</textarea>
                </div>

            </div>

            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>

@endsection
