@extends('layouts.app')

@section('title')
    SCloth
@endsection

@section('content')
    {{--  header  --}}
    <header class="text-center">
        <h1>
           The last Collection of the year
        </h1>
        <p class="mt-3">
            Here you can find the last collection of the year
        </p>
        <a href="#" class="btn btn-get-started px-4 mt-4">
            Shop Now
        </a>
    </header>
    {{--  akhir header  --}}

    <main>

        {{--  Stats section  --}}
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
                <div class="col-4 col-md-2 stats-detail text-center">
                    <i class="fas fa-truck"></i>
                    <p>Free Shipping</p>
                </div>
                <div class="col-4 col-md-2 stats-detail text-center">
                    <i class="fas fa-headset"></i>
                    <p>Support 24/7</p>
                </div>
                <div class="col-4 col-md-2 stats-detail text-center">
                    <i class="fas fa-sync-alt"></i>
                    <p>30Days return</p>
                </div>
            </section>
        </div>
        {{--  akhir stats  --}}

        {{--  category section  --}}
        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>New Apparel</h2>
                    </div>
                </div>
            </div>
        </section>

        {{--  isi category  --}}
        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-shop row justify-content-center">

                    @foreach ($items as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card-shop text-center d-flex flex-column"
                            style="background-image: url('{{ $item->cloths->first()->image }}');">
                            <div class="shop-button mt-auto">
                                <div class="title-product bg-light">{{ $item->category }}</div>
                                <a href="{{ route('catalogue' , $item->id) }}" class="btn btn-shop-details mt-4 px-4">
                                    View Catalogue
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        {{--  akhir isi category  --}}

        {{--  testimonial  --}}
        <section class="section-testimonials-heading" id="testimonialsHeading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Testimonial</h2>
                        <p>
                            Moments were giving them
                            <br />
                            the best experience
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{--  isi testimonial  --}}
        <section class="section-testimonials-content" id="testimonialsContent">
            <div class="container">
                <div class="section-popular-shop row justify-content-center match-height">

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <h3 class="mb-4">Jonas</h3>
                                <p class="testimonials">
                                    “Harga murah. Barangnya bagus dan sesuai.
                                    Pengirimannya juga cepat“
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <h3 class="mb-4">Shania</h3>
                                <p class="testimonials">
                                    “Ukuran pas. Barangnya sesuai.
                                    Cepat dan aman. Puas deh“
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content mb-auto">
                                <h3 class="mb-4">Nana</h3>
                                <p class="testimonials">
                                    “Kualitas produknya terjamin. Nyaman dipakai.
                                    Ukuran pakaiannya pas banget.“
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{--  akhir isi testimonial  --}}
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-5 mx-1">
                            I Need Help
                        </a>
                        <a href="#" class="btn btn-get-started px-4 mt-5 mx-1">
                            Get Started
                        </a>
                    </div>
                </div>

            </div>
        </section>

        {{--  akhir testimonial  --}}
    </main>
@endsection
