@extends('admin.layouts.master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">THÊM MỚI SẢN PHẨM </h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <div class="row g-3">
                                <form action="{{ route('products.store') }}" method='post' enctype="multipart/form-data">
                                    @csrf
                                <div class="col-12">
                                    <label class="form-label">Tên </label>
                                    <input type="name" class="form-control" name="name">
                                </div>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Giá</label>
                                        <input type="name" class="form-control" name="price">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" placeholder="Mô tả......." name="description" rows="4" cols="4"></textarea>
                                        @error('description')
                                        <div style="color: red">{{$message}}</div>
                                        @enderror
                                      </div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <label class="control-label" for="flatpickr01">Thể loại<abbr
                                                    name="category_id"></abbr></label>
                                            @error('description')
                                                <div style="color: red">{{ $message }}</div>
                                            @enderror
                                            <select name="category_id" id="" class="form-control">
                                                <option value="">--Vui lòng chọn--</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Hình ảnh</label>
                                            <input class="form-control" name="image" type="file">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary px-4">Thêm </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

@endsection
