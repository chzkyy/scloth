<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = Category::with(['cloths'])->get();
        return view('pages.home', ['items' => $items]);
    }
}
