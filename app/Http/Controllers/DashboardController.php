<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cloth;
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
}
