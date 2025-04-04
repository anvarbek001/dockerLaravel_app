<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Post tahrirlash</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Post nomi</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="body">Post izohi</label>
                <textarea class="form-control" name="body" id="body">{{ $post->body }}</textarea>
            </div>
            <div class="mb-3">
                <label for="photo">Post rasmi</label>
                <input class="form-control" type="file" id="photo" value="{{ $post->photo }}">
            </div>
            <div class="mb-3">
                <button class="btn btn-success" onclick="return confirm('Tahrirlashni davom ettirasizmi?')">Tahrirlash</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet"></script>
</body>

</html>
