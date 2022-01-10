<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cloth;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($slug){
        return view('pages.detail', [
            'title'     => 'Detail Product',
            'category'  => Category::with(['cloths'])->get(),
            'item'      => Cloth::with(['detail', 'category'])->where('slug', $slug)->firstOrFail(),
        ]);
    }
}
