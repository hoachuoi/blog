<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>blog detail</title>
</head>
<body>
    <h1>Blog Detail</h1>
    <a href="/"> <button>Home</button></a>
    <br>
    <div class="blog-entry">
        <h2>{{ $blog->title }}</h2>
    </div>

    <br>
    <div>
        <div> <h3>Nội dung: </h3> </div>
        <div> <p>{{ $blog->content }}</p> </div>
    </div>
    <br>

    <p>{{ $blog->author }}</p>
    <br>
        <div style="display: flex">
            <lable>Ngày tạo:  </lable>
            <a style="padding-left: 5px" > {{$blog->created_at}}</a>
        </div>
        <div style="display: flex">
            <lable>Ngày cập nhật: </lable>
            <a style="padding-left: 5px">{{$blog->updated_at}}</a>
        </div>



    <div style="display: flex; ">
        <div style="padding-right: 20px">
            <a href="/blogs/{{ $blog->id }}/edit"><button>Edit</button></a>
        </div>
        <div>
            <form action="/blogs/{{ $blog->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: red">Delete</button>
            </form>
        </div>
    </div>

</body>
</html>
