<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $news = News::latest()->paginate(3);

        $recentNews = News::latest()->take(5)->get();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json($recentNews);
        }

        return view('pages.news.index', compact('news', 'recentNews'));
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->incrementView();

        $recentNews = News::latest()->take(5)->get();

        return view('pages.news.show', compact('newsItem', 'recentNews'));
    }
}
