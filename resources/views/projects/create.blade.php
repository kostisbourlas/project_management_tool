<!DOCTYPE html>
<html>
<head>
    <title>FakeCamp</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
</head>
<body>

    <form method="POST" action="/projects" class="container" style="padding-top: 40px">
        @csrf

        <h1 class="heading is-1">Create a Project</h1>

        <div class="field">
            <label for="title" class="label">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>

            <div class="control">
                <textarea class="textarea" name="description" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Create Project</button>
            </div>
        </div>
    </form>
</body>
</html>
