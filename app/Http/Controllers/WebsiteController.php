<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Website;
use App\Models\Category;

class WebsiteController extends Controller
{
    public function index()
    {
        $categories = Category::with('websites')->get();
        return view('home', ['categories' => $categories]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $websites = Website::where('name', 'LIKE', "%$query%")->get();
        return view('search', compact('websites'));
    }


    public function addWebsite()
    {
        $categories = Category::with('websites')->get();
        return view('create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        $website = Website::create($request->only('name', 'url'));
        $website->categories()->attach($request->input('categories'));
        return redirect()->back();
    }

    public function vote(Website $website)
    {
        $website->increment('votes');
        return redirect()->back();
    }
}

