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
                                    {{ $item->category->category }}
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    Catalogue
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $item->name }}
                                </li>
                            </ol>
                        </nav>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1> {{ $item->name }} </h1>
                            <hr>
                            <img src="{{ url('images/' . $item->image) }}" class="rounded mx-auto d-block">
                            <h2 class="mt-5">Deskripsi Pakaian</h3>
                                <hr>
                                {{ $item->detail->description }}
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h4>Cloth Details</h4>
                            <table class="item-info">
                                <tr>
                                    <th width="50%">Sold: </th>
                                    <td width="50%" class="text-right">
                                        20 item(s)
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Price: </th>
                                    <td width="50%" class="text-right">
                                        Rp. {{ number_format($item->price, 0, ',', '.') }}
                                    </td>
                                </tr>
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <th>Quantity :</th>
                                        <td>
                                            <input type="number" class="w-100 form-control" name="quantity" id="quantity"
                                                min="1" required value="{{ request('quantity') }}">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="image" value="{{ $item->image }}">
                                        </td>
                                    </tr>
                            </table>
                                <button class="btn btn-success mt-3" type="submit">Add to Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
