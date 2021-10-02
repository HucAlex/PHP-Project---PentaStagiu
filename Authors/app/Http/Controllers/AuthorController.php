<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getIndex()
    {
        $authors = Author::orderBy('created_at', 'desc')->get();
        return view('blog.index', ['authors' => $authors]);
    }

    public function getAdminIndex()
    {
        $authors = Author::orderBy('title', 'asc')->get();
        return view('admin.index', ['authors' => $authors]);
    }

    public function getPost($id)
    {
        $authors = Author::where('id', $id)->first(); // same as find 
        return view('blog.post', ['authors' => $authors]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit($id)
    {
        $author = Author::find($id);
        return view('admin.edit', ['author' => $author, 'authorId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'author' => 'required|min:10'
        ]);
            $author = new Author([
                'title' =>  $request->input('title'),
                'author' => $request->input('author')
            ]);
            $author->save();
        return redirect()->route('admin.index')->with('info', 'Post created, Title is: ' . $request->input('title') . 'by '. $request->input('author'));
    }

    public function postAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'author' => 'required|min:10'
        ]);
        $author = Author::find($request->input('id'));
        $author->title = $request->input('title');
        $author->author = $request->input('author');
        $author->save();
        return redirect()->route('admin.index')->with('info', 'Post edited, Title is: ' . $request->input('title') . 'by' . $request->input('author'));
    }

    public function getAdminDelete($id)
    {
        $author = Author::find($id);
        $author->delete();
        return redirect()->route('admin.index')->with('info', 'Author deleted!');
    }
}
