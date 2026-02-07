<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = Artikel::where('status', 'published')->latest()->get();
        return view('artikel.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Artikel::where('slug', $slug)->where('status', 'published')->firstOrFail();
        
        $article->increment('view');

        return view('artikel.show', compact('article'));
    }
}
