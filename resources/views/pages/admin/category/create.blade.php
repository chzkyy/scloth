@extends('layouts.admin')

@section('title')
  {{ $title }}
@endsection

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Project</h1>

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
                <form action="{{ route('project.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-grup mb-3">
                        <label for="name">Nama Project</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Project" value="{{ old('name') }}">
                    </div>

                    <div class="form-grup mb-3">
                        <label for="short_description">Description</label>
                        <textarea name="short_description" placeholder="Description" rows="3" class="d-block w-100 form-control">{{ old('short_description') }}</textarea>
                    </div>


                    <div class="form-group mb-3">
                        <label for="image">Project Image</label>
                        <img class="img-fluid img-preview col-sm-5 mb-3">
                        <input type="file" class="form-control" name="image" multiple accept="image/*" id="image" onchange="previewImage()">
                    </div>

                    <div class="form-group mb-3">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" name="role" placeholder="Role" value="{{ old('role') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="tools_project">Tools</label>
                        <input type="text" class="form-control mb-2" name="tools_project" placeholder="Add Tools" value="{{ old('tools_project') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="linkproject">Link Project</label>
                        <input type="text" class="form-control" name="linkproject" placeholder="Link Project" value="{{ old('linkproject') }}">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="linkgithub">Link Github</label>
                        <input type="text" class="form-control" name="linkgithub" placeholder="Link Github" value="{{ old('linkgithub') }}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Simpan
                    </button>

                </form>
            </div>
        </div>
    </div>
@endsection
