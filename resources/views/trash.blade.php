<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>list blog</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
<div >
    <h1>Danh sách Blog</h1>
    <a href="/"><button>Home</button></a>
    <ul>
        @foreach($blogs as $blog)
            <li>
                <div class="blog-entry">
                    <a class="blog-title" href="/blogs/{{ $blog->id }}">{{ $blog->title }}</a>
                </div>

                <br>
                <a>{{$blog->content}}</a>
                <br>
                <div style="display: flex">
                    <div >
                        <form action="/blogs/{{ $blog->id}}/restore " method="POST">
                            @csrf
                            <button type="submit">Khôi phục</button>
                        </form>
                    </div>
                    <div>
                        <form action="/blogs/{{ $blog->id}}/force-delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: red">Xóa hẳn</button>
                        </form>
                    </div>
                </div>

            </li>
        @endforeach
    </ul>
</div>

</body>
</html>
