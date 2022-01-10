<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home', [
            'title'         => 'Home',
            'category'      => Category::with(['cloths'])->get(),
        ]);
    }
}
