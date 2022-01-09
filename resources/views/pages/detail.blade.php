@extends('layouts.app')

@section('title')
    SCloth
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
                                <li class="breadcrumb-item active" aria-current="page">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h1> {{ $item->name }} </h1>
<<<<<<< HEAD
                            <img src="{{ url('images/' . $item->image) }}" class="rounded mx-auto d-block">
=======
                            <img src="{{ url($item->image) }}" class="rounded mx-auto d-block">
>>>>>>> 9dea6018ea1879c9cb23a6bfc56b900819cff2c0
                            <h2>Deskripsi Pakaian</h3>
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
                                        Rp. {{ number_format($item->price,0,",",".") }}
                                    </td>
                                </tr>
                            </table>
                            <button class="btn btn-success" type="submit">Add to Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
