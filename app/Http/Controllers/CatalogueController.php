<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cloth;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index($id){

        return view('pages.catalogue', [
            'items'     => Cloth::with(['category'])
                            ->where('category_id', $id)
                            ->get(), 

            'name'      => Cloth::with(['category'])
                            ->where('category_id', $id)
                            ->firstOrFail(),
            'category'  => Category::with(['cloths'])
                            ->get(),
        ]);
    }
}
