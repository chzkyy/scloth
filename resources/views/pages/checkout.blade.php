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
                                <li class="breadcrumb-item" aria-current="page">
                                    Shopping Cart
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Checkout
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
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- TODO: Looping Data Cart-->
                            @forelse ($checkout as $item)
                            @if ($loop->last)
                                <tr>
                                    <td>
                                        <img src="{{ url('images/' . $item->image) }}" class="img-small">
                                    </td>
                                    <td>{{ $item->cloths->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp. {{ number_format($item->cloths->price, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                            <tr>
                                <td colspan="3">
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    @foreach ($checkout as $item)
                                    @if ($loop->last)
                                        <h5>Rp. {{ number_format($item->cloths->price * $item->quantity, 0, ',', '.') }}</h5>
                                    @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <form action="{{ route('transaction.store') }}" method="POST">
                                        @csrf
                                        @foreach ($checkout as $item)
                                        @if ($loop->last)
                                            <input type="hidden" name="quantity" id="quantity" value="{{ $item->quantity }}">
                                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                            <input type="hidden" name="image" value="{{ $item->image }}">
                                        @endif
                                        @endforeach
                                        <button class="btn btn-success float-right">
                                            Checkout
                                            <i class="fas fa-chevron-right"></i>
                                        </button>
                                    </form>
                                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary float-left">
                                        <i class="fas fa-chevron-left"></i>
                                        Back
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
@endsection
