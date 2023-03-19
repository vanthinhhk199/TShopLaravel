@extends('layouts.front')

@section('title')
    Product
@endsection

@section('content')
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <h2>{{ $category->name }}</h2>
        <div class="row px-xl-5">
            @foreach ($products as $prod)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100 img-prod" src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ url('product/'.$prod->id) }}"><i class="fa fa-search"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ $prod->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$ {{ number_format($prod->original_price, 2) }}</h5><h6 class="text-muted ml-2"><del>$ {{ number_format($prod->selling_price, 2) }}</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
