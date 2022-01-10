@extends('layouts.dashboard')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Product {{ $cloth->name }}</h1>
      </div>

      <!-- Content Row -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Product Name</th>
                        <td>{{ $cloth->name }}</td>
                    </tr>
                    <tr>
                        <th>Category Product</th>
                        <td>{{ $cloth->category->category }}</td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>Rp. {{ number_format($cloth->price,0,",",".") }}</td>
                    </tr>
                    <tr>
                        <th>Product Image</th>
                        <td>
                            <img src="{{ url('images/'.$cloth->image) }}" alt="{{ $cloth->name }}" width="100">
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $detail->description }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection