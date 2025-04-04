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
        <h1 class="text-center">Foydalanuvchilar</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @auth
            <div class="d-flex">
                <a href="{{ route('posts.create') }}" type="button" class="btn btn-outline-primary">Post qo'shish</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">Chiqish</button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}" type="button" class="btn btn-outline-primary">Kirish</a>
            <a href="{{ route('register') }}" type="button" class="btn btn-outline-primary">Registratsiya</a>
        @endauth
        <div class="row">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Post Nomi</th>
                        <th scope="col">Post Egasi</th>
                        <th scope="col">Post Izohi</th>
                        <th scope="col">Rasm</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="text-center">
                            <th width="15%" scope="row">{{ $post->id }}</th>
                            <td width="20%"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td width="20%">{{ $post->user->name }}</td>
                            <td width="20%">{{ Str::limit($post->body, 40, '...') }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}"><img class="w-25" src="{{ asset('storage/' . $post->photo) }}" alt=""></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        let alertSuccess = document.querySelector('.alert-success');
        setTimeout(() => {
            alertSuccess.remove();
        }, 5000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" rel="stylesheet"></script>
</body>

</html>
