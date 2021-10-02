<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function getIndex()
    {
        $publishers = Publisher::orderBy('created_at', 'desc')->get();
        return view('blog.index', ['publishers' => $publishers]);
    }

    public function getAdminIndex()
    {
        $publishers = Publisher::orderBy('publisher_name', 'asc')->get();
        return view('admin.index', ['publishers' => $publishers]);
    }

    public function getPost($id)
    {
        $publishers = Publisher::where('id', $id)->first();
        return view('blog.post', ['publishers' => $publishers]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit($id)
    {
        $publisher = Publisher::find($id);
        return view('admin.edit', ['publisher' => $publisher, 'publisherId' => $id]);
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'publisher_name' => 'required|min:5',
            'publisher_year' => 'required|min:4'
        ]);
            $publisher = new Publisher([
                'publisher_name' =>  $request->input('publisher_name'),
                'publisher_year' => $request->input('publisher_year')
            ]);
            $publisher->save();
        return redirect()->route('admin.index')->with('info', 'Post created, Publisher name is: ' . $request->input('publisher_name') . 'with publication year '. $request->input('publisher_year'));
    }

    public function postAdminUpdate(Request $request)
    {
        $this->validate($request, [
            'publisher_name' => 'required|min:5',
            'publisher_year' => 'required|min:4'
        ]);
        $publisher = Publisher::find($request->input('id'));
        $publisher->publisher_name = $request->input('publisher_name');
        $publisher->publisher_year = $request->input('publisher_year');
        $publisher->save();
        return redirect()->route('admin.index')->with('info', 'Post edited, Publisher name is: ' . $request->input('publisher_name') . 'with publication year ' . $request->input('publisher_year'));
    }

    public function getAdminDelete($id)
    {
        $publisher = Publisher::find($id);
        $publisher->delete();
        return redirect()->route('admin.index')->with('info', 'Publisher deleted!');
    }
}
