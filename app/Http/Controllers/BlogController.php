<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
        ]);
        //$data = $request->all();
        Blog::create($validatedData);

        return redirect('/blogs/create')->with('success', 'Blog được tạo thành công!');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       // $blogs = Blog::query()->where('is_deleted', null)->get();
        $blogs = Blog::paginate(4);
//        foreach ($blogs as $blog) {
//            echo $blog->title . '<br>';
//            echo $blog->content . '<br>';
//            echo $blog->author . '<br>';
//        }
        return view('listblog', ['blogs' => $blogs]);
    }
    public function trash()
    {
        //
        $blogs = Blog::query()->onlyTrashed()->get();

        return view('trash', ['blogs' => $blogs]);
    }

    public function show(string $id)
    {
        //
        $blog = Blog::query()->find($id);
        return view('blogdetail', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $blog = Blog::query()->find($id);
        return view('edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
        ]);
        $blog = Blog::query()->find($id);
        $blog->update($validatedData);
        return redirect('/blogs/' . $id . '/edit')->with('success', 'Blog cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyflag($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect('/')->with('success', 'Xóa Thành công!');
    }

    public function restore($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->restore();

        return redirect('/blogs/trash')->with('success', 'Blog khôi phục thành công!');
    }

    public function forceDelete($id)
    {
        $blog = Blog::withTrashed()->findOrFail($id);
        $blog->forceDelete();

        return redirect('/blogs/trash')->with('success', 'Blog đã bị xóa vĩnh viễn!');
    }
    public function search(Request $request)
    {
        $search = $request->get('keyword');
        $blogs = Blog::query()->where('title', 'like', '%' . $search . '%')->get();
        return view('listsearch', ['blogs' => $blogs]);

    }
}
