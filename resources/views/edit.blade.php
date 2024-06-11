<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>Create</title>
</head>
<body>
<a href="/"><button>Home</button></a>
<form class="fomr1" action="/blogs/{{$blog->id}}" method="POST">
    @method('PUT')
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{$blog->title}}">
    <br>
    <label for="content">Content:</label>
    <textarea name="content" id="content" cols="30" rows="10" >{{old('content', $blog->content)}}</textarea>
    <br>
    <label for="author">Author</label>
    <input type="text" name="author" id="author" value="{{$blog->author}}">
    <br>
    <button type="submit">Cập nhật Blog</button>
</form>

@if(session('success'))
    <div id="alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</body>
</html>
