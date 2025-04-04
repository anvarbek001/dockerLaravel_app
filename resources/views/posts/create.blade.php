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
        <h1 class="text-center">Post qo'shish</h1>
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Nomi</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Izoh</label>
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Rasm</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Qo'shish</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet"></script>
</body>

</html>
