@extends('layouts.dashboard')

@section('title')
  {{ $title }}
@endsection

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Category</h1>

        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
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
                <form action="{{ route('dashboard.catalogue.update',[$cloth->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-grup mb-3">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Product Name" value="{{ $cloth->name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id">Category Name</label>
                        <div class="col-md-6">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="{{ $selected->category_id }}">{{ $selected->category->category }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Product Image</label>
                        @if ($cloth->image)
                            <img src="{{ url('images/'.$cloth->image) }}" class="d-block img-fluid mb-3 col-sm-5 img-preview">
                        @else
                            <img class="img-fluid img-preview col-sm-5 mb-3">
                        @endif
                        <input type="file" class="form-control" name="image" multiple accept="image/*" id="image" onchange="previewImage()">
                    </div>

                    <div class="form-group mb-3">
                        <label for="price">Product Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Product Price" value="{{ $cloth->price }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="slug">Slug Product</label>
                        <input type="text" class="form-control" name="slug" placeholder="Slug Product" value="{{ $cloth->slug }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Product Description">{{ $detail->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
