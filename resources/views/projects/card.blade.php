<div class="card" style="height: 200px">
    <a href={{ $project->path() }}>
        <h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-400 pl-4">{{ $project->title }}</h3>
    </a>

    <div class="text-gray-600">{{ Str::limit($project->description, 100)}}</div>
</div>

