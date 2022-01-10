@extends('layouts.dashboard')

@section('title')
  {{ $title }}
@endsection

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>

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
                <form action="{{ route('dashboard.category.update',[$category->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-grup mb-3">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Category Name" value="{{ $category->category }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="image">Category Image</label>
                        @if ($category->image)
                            <img src="{{ url('images/'.$category->image) }}" class="d-block img-fluid mb-3 col-sm-5 img-preview">
                        @else
                            <img class="img-fluid img-preview col-sm-5 mb-3">
                        @endif
                        <input type="file" class="form-control" name="image" multiple accept="image/*" id="image" onchange="previewImage()">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
