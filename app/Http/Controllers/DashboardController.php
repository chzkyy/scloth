<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cloth;
use App\Models\Detail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.dashboard',[
                'title'    => 'Dashboard',
                'category' => Category::all(),
                'cloth'    => Cloth::all(),
                'transaction' => Transaction::all(),
            ]);
        } else {
            return redirect('/');
        }
    }

    // view index category
    public function indexCategory()
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.category.index',[
                'category' => Category::all(),
                'title'    => 'Category',
            ]);
        } else {
            return redirect('/');
        }
    }

    // view create category
    public function createCategory()
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.category.create',[
                'title' => 'Create Category',
            ]);
        } else {
            return redirect('/');
        }
    }

    // add category
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name'  => 'required | string | max:255',
            'image' => 'required | image  | mimes:jpeg,png,jpg,gif,svg',
        ]);

        $images = $request->file('image');
        Category::create([
            'category' => $request->name,
            'image'    => $images->getClientOriginalName(),
        ]);

        $images->move(public_path('images'), $images->getClientOriginalName());
        return redirect()->route('dashboard.category')->with('success', 'Category has been created');
    }

    // view edit category
    public function editCategory($id)
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.category.edit',[
                'title'     => 'Edit Category',
                'category'  => Category::find($id),
            ]);
        } else {
            return redirect('/');
        }
    }

    // update category
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required | string | max:255',
            'image' => 'image    | mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->file('image')) {
            $images = $request->file('image');
            $images->move(public_path('images'), $images->getClientOriginalName());
            Category::where('id', $id)->update([
                'category' => $request->name,
                'image'    => $images->getClientOriginalName(),
            ]);
        } else {
            Category::where('id', $id)->update([
                'category' => $request->name,
            ]);
        }
        return redirect()->route('dashboard.category')->with('success', 'Category has been updated');
    }

    // delete category
    public function deleteCategory($id)
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            $category = Category::find($id);
            $category->delete();
            return redirect()->route('dashboard.category')->with('success', 'Category has been deleted');
        } else {
            return redirect('/');
        }
    }

    // view index catalogue
    public function indexCatalogue()
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.catalog.index',[
                'title'     => 'Catalogue',
                'cloth'     => Cloth::all(),
            ]);
        } else {
            return redirect('/');
        }
    }

    // view create catalogue
    public function createCatalogue()
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.catalog.create',[
                'title'      => 'Create Catalogue',
                'categories' => Category::all(),
            ]);
        } else {
            return redirect('/');
        }
    }

    // add catalogue
    public function storeCatalogue(Request $request)
    {
        $request->validate([
            'name'         => 'required | string | max:255',
            'category_id'  => 'required | string | max:255',
            'slug'         => 'required | string | max:255',
            'image'        => 'required | image  | mimes:jpeg,png,jpg,gif,svg',
            'price'        => 'required | numeric',
        ]);

        $images = $request->file('image');
        Cloth::create([
            'name'          => $request->name,
            'category_id'   => $request->category_id,
            'image'         => $images->getClientOriginalName(),
            'price'         => $request->price,
            'slug'          => $request->slug,
        ]);

        Detail::create([
            'cloth_id'      => Cloth::where('name', $request->name)->first()->id,
            'description'   => $request->description,
        ]);

        $images->move(public_path('images'), $images->getClientOriginalName());
        return redirect()->route('dashboard.catalogue')->with('success', 'Catalogue has been created');
    }

    // view edit catalogue
    public function editCatalogue($id)
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.catalog.edit',[
                'title'      => 'Edit Catalogue',
                'categories' => Category::all(),
                'selected'   => Cloth::find($id),
                'cloth'      => Cloth::find($id),
                'detail'     => Detail::where('cloth_id', $id)->first(),
            ]);
        } else {
            return redirect('/');
        }
    }

    // update catalogue
    public function updateCatalogue(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required | string | max:255',
            'category_id'  => 'required | string | max:255',
            'slug'         => 'required | string | max:255',
            'image'        => 'image    | mimes:jpeg,png,jpg,gif,svg',
            'price'        => 'required | numeric',
        ]);

        if($request->file('image')) {
            $images = $request->file('image');
            $images->move(public_path('images'), $images->getClientOriginalName());
            Cloth::where('id', $id)->update([
                'name'          => $request->name,
                'category_id'   => $request->category_id,
                'image'         => $images->getClientOriginalName(),
                'price'         => $request->price,
                'slug'          => $request->slug,
            ]);
        } else {
            Cloth::where('id', $id)->update([
                'name'          => $request->name,
                'category_id'   => $request->category_id,
                'price'         => $request->price,
                'slug'          => $request->slug,
            ]);
        }

        Detail::where('cloth_id', $id)->update([
            'description'   => $request->description,
        ]);

        return redirect()->route('dashboard.catalogue')->with('success', 'Catalogue has been updated');
    }

    // delete catalogue
    public function deleteCatalogue($id)
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            $cloth = Cloth::find($id);
            $cloth->delete();
            return redirect()->route('dashboard.catalogue')->with('success', 'Catalogue has been deleted');
        } else {
            return redirect('/');
        }
    }

    //view detail catalogue
    public function detailCatalogue($id)
    {
        if (Auth::check() && Auth::user()->roles == 'admin') {
            return view('pages.admin.catalog.detail',[
                'title'      => 'Detail Catalogue',
                'cloth'      => Cloth::find($id),
                'detail'     => Detail::where('cloth_id', $id)->first(),
            ]);
        } else {
            return redirect('/');
        }
    }

    //dashboard transaction
    public function indexTransaction()
    {
        return view('pages.admin.transaction.index',[
            'title'              => 'Transaction',
            'category'           => Category::with(['cloths'])->get(),
            'transaction'        => Transaction::first()->get(),
            'paginate'           => Transaction::paginate(10),
        ]);
    }
}
