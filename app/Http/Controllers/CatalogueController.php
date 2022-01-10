<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cloth;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index($id){

        return view('pages.catalogue', [
            'title'         => 'Catalogue',
            'products'      => Cloth::where('category_id', $id)->get(),                
            'category'      => Category::with(['cloths'])->get(),
        ]);
    }
}
