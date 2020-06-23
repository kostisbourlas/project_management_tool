@csrf

<div class="field mb-6">
    <label for="title" class="label text-sm mb-2 block">Title</label>

    <div class="control">
        <input type="text" value="{{ $project->title }}" class="input bg-transparent border border-blue-300 rounded p-2 text-xs w-full" name="title" placeholder="Title" required>
    </div>
</div>

<div class="field mb-6">
    <label for="description" class="label text-sm mb-2 block">Description</label>

    <div class="control">
        <textarea class="textarea bg-transparent border border-blue-300 rounded p-2 text-xs w-full" name="description" rows="8" placeholder="Description" required>{{ $project->description }}</textarea>
    </div>
</div>

<div class="field">
    <div class="control flex">
        <button type="submit" class="button is-link bg-blue-400 rounded-full shadow py-2 px-4 mr-2 text-white text-sm">{{ $buttonText }}</button>
        <a href="{{ $project->path() }}" class="bg-gray-700 rounded-full shadow py-2 px-4 text-white text-sm">Cancel</a>
    </div>
</div>


@if ($errors->any())
    <div class="field mt-6">
        @foreach($errors->all() as $error)
            <li class="text-sm text-red">{{ $error }}</li>
        @endforeach
    </div>
@endif
