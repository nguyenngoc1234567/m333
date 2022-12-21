@extends('shop.layouts.master')
@section('content')
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">sản phẩm </th>
                                <th scope="col">Ảnh </th>
                                <th scope="col">giá</th>
                                <th scope="col">số lượng</th>
                                <th scope="col">tổng</th>
                                <th scope="col">tuỳ chọn </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                                $totalAll = 0;
                            @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $total = $details['price'] * $details['quantity'];
                                        $totalAll += $total;

                                    @endphp
                                   <tr>
                                    <td class="align-middle">
                                        <img src="{{ asset('public/uploads/product/'.$details['image']) }}" alt="" style="width: 50px;"></td>
                                       <td class="align-middle"> <a>{{ $details['nameVi'] ?? '' }}</a></td>
                                    <td class="align-middle">Vnd {{ number_format($details['price']) }}</td>
                                    <td class="align-middle">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus" >
                                                <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value=" {{ $details['quantity'] }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">Vnd {{ number_format($total) }}</td>
                                    <td class="align-middle">
                                        <button class="btn btn-sm btn-danger" ><a data-href=""
                                            class="btn btn-danger btn-sm fa fa-window-close"
                                            id="{{ $id }}">Xóa</a></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </section>

    <div class="col-lg-8">
        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Tóm tắt giỏ hàng</span></h5>
        <div class="bg-light p-30 mb-5">
            <div class="border-bottom pb-2">
                <div class="d-flex justify-content-between mb-3">
                    <h6>Tổng</h6>
                    {{-- <h6>$ {{ $totalAll}}</h6> --}}
                    <h6>Vnd {{ number_format($totalAll) }}</h6>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="font-weight-medium">Phí vận chuyển</h6>
                    <h6 class="font-weight-medium">Vnd 10</h6>
                </div>
            </div>
            <div class="pt-2">
                <div class="d-flex justify-content-between mt-2">
                    <h5>Tổng thu</h5>
                    <h5>{{ number_format($totalAll + 10)  }} Vnd </h5>
                    @if (session('cart'))
                    @endif
                </div>
            </div>

            <a href="{{ route('checkOuts') }}" class="btn btn-danger pull-right">Thanh toán</a>
        </div>
</div>
@endsection
