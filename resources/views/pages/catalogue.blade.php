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
                                    {{ $name->category->category }}
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Catalogue
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    @foreach ($items as $item)
                    <div class="col-sm-3 my-2">
                        <div class="card card-details p-0">
                            <img src="{{ url($item->image) }}" class="img-small">
                            <h5 class="text-center"> {{ $item->name }} </h5>
                            <a href="{{ route('detail' , $item->slug) }}" class="btn btn-secondary mt-0">
                                View Details
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
    </main>
@endsection
