<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Cloth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('pages.cart',[
            'title'      => 'Cart',
            'category'   => Category::with(['cloths'])->get(),
            'cart'       => Cart::where('user_id', auth()->user()->id)->get(),
            'cloth'      => Cloth::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        Cart::create([
            'user_id'    => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'image'      => $request->image,            
        ]);

        return back()->with('success', 'Product added to cart');
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->quantity = $request->quantity;
        $cart->save();

        return back()->with('success', 'Cart updated');
    }

    public function destroy($id)
    {
        Cart::find($id)->delete();

        return back()->with('success', 'Product removed from cart');
    }
}
