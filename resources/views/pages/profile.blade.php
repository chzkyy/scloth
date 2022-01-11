@extends('layouts.app')

@section('title')
  {{ $title }}
@endsection

@section('content')
    <main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container-fluid w-50">

                <div class="row">
                    <div class="col p-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
          
                <!-- Content Row -->
                  <div class="card shadow">
                      <div class="card-body">
                          <table class="table table-bordered">
                              <tr>
                                  <th>Name :</th>
                                  <td>{{ $user->name }}</td>
                              </tr>
                              <tr>
                                  <th>Email :</th>
                                  <td>{{ $user->email }}</td>
                              </tr>
                              <tr>
                                  <th>Address :</th>
                                  <td>{{ $user->address }}</td>
                              </tr>
                              <tr>
                                  <th>Role :</th>
                                  <td>{{ $user->roles }}</td>
                              </tr>
                          </table>
                      </div>
                  </div>
              </div>
        </section>
    </main>
@endsection