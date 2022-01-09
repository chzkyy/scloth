<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Category;
=======
>>>>>>> 9dea6018ea1879c9cb23a6bfc56b900819cff2c0
use App\Models\Cloth;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
<<<<<<< HEAD
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
=======
    //
    public function index(Request $request, $id){
        $items = Cloth::with(['category'])->where('category_id', $id)->get();
        $name = Cloth::with(['category'])->where('category_id', $id)->firstOrFail();
        // dd($name);
        return view('pages.catalogue', ['items' => $items, 'name' => $name]);
>>>>>>> 9dea6018ea1879c9cb23a6bfc56b900819cff2c0
    }
}
