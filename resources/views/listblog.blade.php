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
<body>
    <div >
        <div>
            <h1>Danh sách Blog</h1>
            <a href="/blogs/create"><button class="button">Tạo mới Blog</button></a>
            <a href="/blogs/trash"><button>Thùng rác</button></a>
        </div>
        <div>
            <form class="fomr1" action="/blogs/search" method="POST" style="display:flex;">
                @csrf
               <input  style="padding: 10px;margin: 10px" type="text" name="keyword" required>
                <button style="padding: 10px;margin: 10px" type="submit" class="button">Search</button>
            </form>
        </div>


        <ul >
            @foreach($blogs as $blog)
                <li  >
                    <div class="blog-entry">
                        <a href="/blogs/{{ $blog->id }}" class="blog-title">{{ $blog->title }}</a>
                    </div>

                    <br>
                    <div class="truncate">
                        <a>{{$blog->content}}</a>
                    </div>

                    <br>
                    <div style="display: flex">
                        <div>
                            <a href="/blogs/{{ $blog->id }}/edit"><button>Sửa</button></a>
                        </div>
                        <div>
                            <form action="/blogs/{{ $blog->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: red">Xóa</button>
                            </form>
                        </div>
                    </div>


                </li>
            @endforeach
        </ul>
        {{-- Hiển thị nút Previous (Trang trước) --}}
        <div>
            @if ($blogs->onFirstPage())
                <span>&laquo;</span>
            @else
                <a href="{{ $blogs->previousPageUrl() }}" rel="prev">&laquo;</a>
            @endif
            {{-- Hiển thị nút Next (Trang tiếp theo) --}}
            @if ($blogs->hasMorePages())
                <a href="{{ $blogs->nextPageUrl() }}" rel="next">&raquo;</a>
            @else
                <span>&raquo;</span>
            @endif
        </div>
    </div>
    @if(session('success'))
        <div >
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
