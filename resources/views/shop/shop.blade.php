@extends('shop.layouts.master')
@section('content')
    <form class="form-inline my-2 my-lg-0">

        <input style="width: 300px; margin-right: 10px; float:right" class="form-control" action="{{ route('shop.search') }}"
            method="GET" name="product" type="text" placeholder="Tìm kiếm theo tên sản phẩm">
        <button style="float:right" class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
        </select>
    </form>
    <div class="container-fluid pt-5">

        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản
                Phẩm</span></h2>
        <div class="row px-xl-5 pb-3">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('public/uploads/product/' . $product->image) }}"
                                alt="">
                            <div class="product-action">
                                {{-- <a href="{{ route('shop.showProduct' , $product->id) }}"><i class="tf-ion-ios-search-strong"></i></a> --}}
                                <a class="btn btn-outline-dark btn-square" href="{{ route('shop.store', $product->id) }}"
                                    id="{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a>
                                <a
                                    class="btn btn-outline-dark btn-square"href="{{ route('shop.showProduct', $product->id) }}"><i
                                        class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4" style="font-family: Arial">
                            <p>Tên sản phẩm : {{ $product->name }}</p>
                            <a class="font-family"></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5 class="text-muted ml-2">Giá : {{ number_format($product->price) }}Vnd </h5>
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
