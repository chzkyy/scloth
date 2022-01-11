<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\Cloth;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction',[
            'title'         => 'Transaction',
            'category'      => Category::with(['cloths'])->get(),
            'transaction'   => Transaction::where('user_id', auth()->user()->id)->get(),
            'cloth'         => Cloth::all(),
        ]);
    }

    //transaction
    public function store(Request $request)
    {
        Transaction::create([
            'user_id'    => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity'   => $request->quantity,
            'image'      => $request->image,
        ]);
        
        Checkout::where('user_id', auth()->user()->id)->delete();
        return redirect()->route('checkout');
    }

    //transaction detail
    public function show($id)
    {
        return view('pages.transactionDetail',[
            'title'              => 'Transaction Detail',
            'category'           => Category::with(['cloths'])->get(),
            'transaction'        => Transaction::where('id', $id)->get(),
        ]);
    }

}
