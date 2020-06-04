<!DOCTYPE html>
<html>
<head>
    <title>FakeCamp</title>
</head>
<body>
    <h1>FakeCamp</h1>

    <ul>
        @forelse($projects as $project)
            <li>
                <a href="{{ $project->path() }}">{{ $project->title }}</a>
            </li>
        @empty
            <li>No projects found.</li>
        @endforelse
    </ul>
</body>
</html>
