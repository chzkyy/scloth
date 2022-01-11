<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile',[
            'title' => 'Profile',
            'category'  => Category::with(['cloths'])->get(),
            'user' => auth()->user()
        ]);
    }
}
