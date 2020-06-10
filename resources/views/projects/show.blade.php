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
                    <div class="card mb-3">Lorem Ipsum</div>
                    <div class="card mb-3">Lorem Ipsum</div>
                    <div class="card mb-3">Lorem Ipsum</div>
                    <div class="card">Lorem Ipsum</div>

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
