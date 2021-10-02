<?php

namespace App\Http\Controllers;

use App\Author;
use App\Publisher;
use Illuminate\Http\Request;

class Album extends Controller
{
    public function getIndex()
    {
        $authors = Author::orderBy('created_at', 'desc')->get();
        $publishers = Publisher::orderBy('created_at', 'desc')->get();
        return view('blog.index', [
            'authors' => $authors,
            'publishers' => $publishers]);
    }

    public function getAdminIndex()
    {
        $authors = Author::orderBy('title', 'asc')->get();
        $publishers = Publisher::orderBy('publisher_name', 'asc')->get();
        return view('admin.index', [
            'authors' => $authors,
            'publishers' => $publishers]);
    }

    public function getPost($id)
    {
        $author = Author::where('id', $id)->first();
        $publisher = Publisher::where('id', $id)->first();
        return view('blog.post', [
            'author' => $author,
            'publisher' => $publisher]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit($id)
    {
        $author = Author::find($id);
        $publisher = Publisher::find($id);
        return view('admin.edit', [
            'author' => $author,
            'authorId' => $id,
            'publisher' => $publisher,
            'publisherId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2',
            'author_name' => 'required|min:2',
            'publisher_name' => 'required|min:2',
            'publisher_year' => 'required|min:2'
        ]);
        $author = new Author([
            'title' =>  $request->input('title'),
            'author_name' => $request->input('author_name')
        ]);
        $author->save();

        $publisher = new Publisher([
            'publisher_name' => $request->input('publisher_name'),
            'publisher_year' => $request->input('publisher_year')
        ]);
        $publisher->save();

        return redirect()->route('admin.index')->with('info', 
        'Post created, Title name is: ' . $request->input('title') . 
        ' by '. $request->input('author_name') . 
        ' published by ' . $request->input('publisher_name') . 
        ' in ' . $request->input('publisher_year'));
    }
    
    public function postAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2',
            'author_name' => 'required|min:2',
            'publisher_name' => 'required|min:2',
            'publisher_year' => 'required|min:2'
        ]);

        $author = Author::find($request->input('id'));
        $author->title = $request->input('title');
        $author->author_name = $request->input('author_name');
        $author->save();

        $publisher = Publisher::find($request->input('id'));
        $publisher->publisher_name = $request->input('publisher_name');
        $publisher->publisher_year = $request->input('publisher_year');
        $publisher->save();

        return redirect()->route('admin.index')->with('info', 
        'Post edited, Title name is: ' . $request->input('title') . 
        ' by '. $request->input('author_name') . 
        ' published by ' . $request->input('publisher_name') . 
        ' in ' . $request->input('publisher_year'));    }

    public function getAdminDelete($id)
    {
        $author = Author::find($id);    
        $author->delete();
        $publisher = Publisher::find($id);
        $publisher->delete();
        return redirect()->route('admin.index')->with('info', 'Book was deleted!');
    }
}
