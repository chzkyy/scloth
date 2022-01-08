<?php

namespace App\Http\Controllers;

use App\Models\Cloth;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    //
    public function index(Request $request, $id){
        $items = Cloth::with(['category'])->where('category_id', $id)->get();
        $name = Cloth::with(['category'])->where('category_id', $id)->firstOrFail();
        // dd($name);
        return view('pages.catalogue', ['items' => $items, 'name' => $name]);
    }
}
