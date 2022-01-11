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
                                <li class="breadcrumb-item active" aria-current="page">
                                    Transaction History
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- TODO: Looping Data Cart-->
                            @forelse ($transaction as $item)
                                <tr>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('transaction.show',[$item->id]) }}">
                                            {{ $item->created_at }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="container">
                        <a href="{{ route('home') }}" class="btn btn-primary">
                            <i class="fas fa-chevron-left"></i>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </section>
@endsection
