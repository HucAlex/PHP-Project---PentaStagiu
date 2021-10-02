<?php

namespace App\Http\Controllers;

use App\Author;
use App\Publisher;
use Illuminate\Http\Request;

//aste e o clasa pentru prima pagina de index ca sa nu am doua indexuri in aceasi clasa deoarece nu stiu cum sa le gestionez pentru doua pagini

class FirstIndexController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy('created_at', 'desc')->get();
        $publishers = Publisher::orderBy('created_at', 'desc')->get();
        return view('blog.index', [
            'authors' => $authors,
            'publishers' => $publishers]);
    }
}