<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getIndex()
    {
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('blog.index', ['books' => $books]);
    }

    public function getAdminIndex()
    {
        $books = Book::orderBy('title', 'asc')->get();
        return view('admin.index', ['books' => $books]);
    }

    public function getPost($id)
    {
        $book = Book::where('id', $id)->first();
        return view('blog.post', ['book' => $book]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit($id)
    {
        $book = Book::find($id);
        return view('admin.edit', ['book' => $book, 'bookId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'author_name' => 'required|min:5',
            'publisher_name' => 'required|min:5',
            'publisher_year' => 'required|min:2'
        ]);
            $book = new Book([
                'title' =>  $request->input('title'),
                'author_name' => $request->input('author_name'),
                'publisher_name' => $request->input('publisher_name'),
                'publisher_year' => $request->input('publisher_year')
            ]);
            $book->save();
        return redirect()->route('admin.index')->with('info', 
        'Post created, Title name is: ' . $request->input('title') . 
        ' by '. $request->input('author_name') . 
        ' published by ' . $request->input('publisher_name') . 
        ' in ' . $request->input('publisher_year'));
    }

    public function postAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'author_name' => 'required|min:5',
            'publisher_name' => 'required|min:5',
            'publisher_year' => 'required|min:2'
        ]);
        $book = Book::find($request->input('id'));
        $book->title = $request->input('title');
        $book->author_name = $request->input('author_name');
        $book->publisher_name = $request->input('publisher_name');
        $book->publisher_year = $request->input('publisher_year');
        $book->save();
        return redirect()->route('admin.index')->with('info', 
        'Post edited, Title name is: ' . $request->input('title') . 
        ' by '. $request->input('author_name') . 
        ' published by ' . $request->input('publisher_name') . 
        ' in ' . $request->input('publisher_year'));    }

    public function getAdminDelete($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('admin.index')->with('info', 'Book was deleted!');
    }
}
