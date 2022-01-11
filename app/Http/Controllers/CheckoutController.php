<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Cloth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('pages.checkout',[
            'title'      => 'Checkout',
            'category'   => Category::with(['cloths'])->get(),
            'checkout'   => Checkout::where('user_id', auth()->user()->id)->get(),
            'cloth'      => Cloth::all(),
        ]);
    }

    public function store(Request $request)
    {
        Checkout::create([
            'user_id'    => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'image'      => $request->image,
        ]);
        
        Cart::where('user_id', auth()->user()->id)->delete();
        return redirect()->route('checkout');
    }
}
