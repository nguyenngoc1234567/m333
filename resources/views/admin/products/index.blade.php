@extends('admin.layouts.master')
@section('content')
{{-- <h3> Sản phẩm </h3> --}}
<h2 style="color: rgb(90, 214, 236);">Sản phẩm</h2>
<div class="container">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<a class="btn btn-success" href="{{route('products.create')}}">Thêm sản phẩm  </a>
<table class="table">
    <div class="col-6">

    </div>
    <thead>
      <tr>
        <th scope="col">Số thứ tự</th>
        <th scope="col">Tên sản phẩm </th>
        <th scope="col">Giá</th>
        <th scope="col">Mô tả sản phẩm </th>
        <th scope="col">Danh mục sản phẩm  </th>
        <th scope="col">Ảnh</th>

        <th adta-breakpoints="xs">Quản lí</th>
      </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($products as $key => $team)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $team->name }}</td>
            <td>{{ $team->price }}</td>
            <td>{{ $team->description }}</td>
            <td>{{ $team->category_id }}</td>
            <td>
                <img style="width:200px ; height: 165px ; border-radius:0%" src="{{ asset('public/uploads/product/'. $team->image) }}" alt=""
                    >
        </td>
            <td>
                <form action="{{route('products.destroy',[$team->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');" class="btn btn-danger">Xóa</button>
                        <a href="{{route('products.edit',[$team->id])}}" class="btn btn-primary">Sửa</a>
                    </form>
            </td>
          </tr>
         @endforeach
    </tbody>
  </table>
</div>
@endsection
