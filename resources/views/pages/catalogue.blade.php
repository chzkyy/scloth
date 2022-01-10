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
                                    {{ $title }}
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Catalogue
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                @if (count($products) >= 1)
                    @foreach ($products as $item)
                    <div class="col-sm-3 my-2">
                        <div class="card card-details p-0">
                            <img src="{{ url('images/' . $item->image) }}" class="img-small">
                            <hr>
                            <span class="text-center h5 mb-3"> {{ $item->name }} </span>
                            <span class="text-center h5 mb-3"> Rp. {{ number_format($item->price) }} </span>
                            <a href="{{ route('detail' , $item->slug) }}" class="btn btn-secondary mt-0">
                                View Details
                            </a>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="container text-center my-5">
                    <h1>No Item</h1>
                </div>
                @endif
                </div>

            </div>
        </section>
    </main>
@endsection
