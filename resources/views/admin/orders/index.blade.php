
@extends('admin.layouts.master')

@section('content')
<h1>Danh sách chi tiêu</h1>
<div class="container">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<a class="btn btn-success" href="">DANH MỤC SẢN PHẨM </a>
<table class="table">
    <div class="col-6">

    </div>
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Tổng Tiền(Đồng)</th>
            <th scope="col">Tùy Chọn</th>
      </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($items as $key=> $item)
        <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->user->name}}</td>
            <td>{{$item->user->email}}</td>
            <td>{{$item->user->phone}}</td>
            <td>{{$item->user->address}}</td>
            <td>{{$item->date_at}}</td>
            <td>{{number_format($item->total)}}</td>
              <td>
                <a  class="btn btn-info" href="">Chi tiết</a>
            </td>
          </tr>
         @endforeach
    </tbody>
  </table>
</div>
@endsection


{{-- @extends('admin.layouts.master')
@section('content')
<main class="page-content">
    {{-- <a   class="btn btn-warning" href="{{route('xuat')}}">Xuất</a> --}}
