<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>list blog</title>
</head>
<body >
<div style="padding-top: 100px">
    <div>
        <div>
            <h1>Kết quả tìm kiếm: </h1>
            <a href="/"><button>Home</button></a>
        </div>
        <div>
            <form action="/blogs/search" method="POST">
                @csrf
                <input type="text" name="keyword" required>
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
        <ul >
            @foreach($blogs as $blog)
                <li  >
                    <div class="blog-entry">
                        <a href="/blogs/{{ $blog->id }}" class="blog-title">{{ $blog->title }}</a>
                    </div>

                    <br>
                    <a>{{$blog->content}}</a>
                    <br>
                    <div style="display: flex">
                        <div>
                            <a href="/blogs/{{ $blog->id }}/edit"><button>Sửa</button></a>
                        </div>
                        <div>
                            <form action="/blogs/{{ $blog->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red" >Xóa</button>
                            </form>
                        </div>
                    </div>


                </li>
            @endforeach
        </ul>




    </div>
</body>
</html>
