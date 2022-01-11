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
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- TODO: Looping Data Cart-->
                            @forelse ($transaction as $item)
                                <tr>
                                    <td>
                                        <img src="{{ url('images/' . $item->image) }}" class="img-small">
                                    </td>
                                    <td>{{ $item->cloth->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>Rp. {{ number_format($item->cloth->price, 0, ',', '.') }}</td>
                                </tr>
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
                                    <h5>Rp. {{ number_format($item->cloth->price * $item->quantity , 0, ',', '.') }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <a href="{{ url()->previous() }}" class="btn float-right btn-outline-secondary">
                                        Back
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
@endsection
