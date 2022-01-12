@extends('layouts.dashboard')

@section('title')
  {{ $title }}
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard {{ $title }}</h1>
      </div>

      <!-- Content Row -->
      <div class="row">
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Address</th>
                                <th>Total price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaction as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    <img src="{{ url('images/' . $item->image) }}" width="100px" class="img-small img-thumbnail">
                                </td>
                                <td>{{ $item->cloth->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->user->address }}</td>
                                <td>Rp. {{ number_format($item->cloth->price * $item->quantity , 0, ',', '.') }}</td>
                            </tr>
                            
                            @empty
                                <td colspan="7" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse
                        </tbody>
                  </table>
                  <div class="d-flex justify-content-center mt-5">
                    {{ $paginate->links() }}
                </div>
              </div>
          </div>
      </div>
    </div>
@endsection