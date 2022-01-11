@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">

                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    Shopping Cart
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- TODO: Looping Data Cart-->
                            @forelse ($cart as $item)
                            <tr>
                                <td>
                                    <img src="{{ url('images/' . $item->image) }}" class="img-small">
                                </td>
                                <td>{{ $item->cloth->name }}</td>
                                <td>Rp. {{ number_format($item->cloth->price, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.update',[$item->id]) }}" method="POST">
                                        @csrf
                                        <input type="number" class="w-50 form-control" name="quantity" id="quantity"
                                                min="1" required value="{{ $item->quantity }}">
                                    </form>
                                </td>
                                <td>Rp. {{ number_format($item->cloth->price * $item->quantity, 0, ',', '.') }}</td>
                                <td class="row">
                                    <form action="{{ route('checkout.store') }}" method="POST">
                                        @csrf
                                        @foreach ($cart as $item)
                                            <input type="hidden" name="quantity" id="quantity" value="{{ $item->quantity }}">
                                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                            <input type="hidden" name="image" value="{{ $item->image }}">
                                        @endforeach
                                        <button type="submit" class="btn mr-3 btn-primary">
                                            Checkout
                                        </button>
                                    </form>

                                    <form action="{{ route('cart.destroy', [$item->id]) }}" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                            
                            <tr>
                                <td colspan="5">
                                    <a href="{{ route('home') }}" class="btn float-left btn-outline-secondary">
                                        <i class="fas fa-chevron-left"></i>
                                        Continue Shopping
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
@endsection
