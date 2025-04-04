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
        <div class="row">
            <h2 class="text-center">{{ $post->user->name }}</h2>
            <div class="text-center col">
                <img src="{{ asset('storage/' . $post->photo) }}" alt="" class="img-fluid w-50">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="text-center">{{ $post->title }}</h1>
                <p>{{ $post->body }}</p>
            </div>
        </div>
        @if($post->user_id == Auth::user()->id)
            <div class="row">
                <div class="col d-flex">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Tahrirlash</a>
                    <form action="{{ route('posts.destroy',$post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Rostdan ham o`chirmoqchimisiz?')" class="btn btn-danger">O`chirish</button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet"></script>
</body>

</html>
