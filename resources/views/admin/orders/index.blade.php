
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
        <th scope="col">Số thứ tự</th>
        <th scope="col">total</th>

        <th adta-breakpoints="xs">Quản lí</th>
      </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($orders as $key => $team)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $team->total }}</td>
            <td>
                    <form action="" method="post">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Bạn có chắc chắn xóa không?');" class="btn btn-danger">Xóa</button>
                        <a href="" class="btn btn-primary">Sửa</a>
                    </form>
            </td>
          </tr>
         @endforeach
    </tbody>
  </table>
</div>
@endsection
