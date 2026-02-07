<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Category for Sidebar
        $categories = Category::withCount('artikel')->get();

        // Carousel: 3 Artikel terbaru
        $carouselArticles = Artikel::where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        // Populer: Berdasarkan view terbanyak
        $popularArticles = Artikel::where('status', 'published')
            ->orderBy('view', 'desc')
            ->take(4)
            ->get();

        // Terbaru: Semua artikel terbaru
        $latestArticles = Artikel::where('status', 'published')
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('categories', 'carouselArticles', 'popularArticles', 'latestArticles'));
    }
}
