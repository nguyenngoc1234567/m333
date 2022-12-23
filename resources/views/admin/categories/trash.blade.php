@extends('admin.layouts.master')
@section('content')
    <div class="table-responsive pt-3">
        <table class="table table-info">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Tên danh mục đã xóa
                    </th>

                    <th>
                        Tùy chọn
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr data-expanded="true" class="item-{{ $category->id }}">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $category->name }}</td>

                        <td>
                            <form action="" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-success">Khôi Phục</button>
                                <a data-href="" id="{{ $category->id }}" class="btn btn-danger">Xóa</a>

                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $categories->appends(request()->query()) }}</tr> --}}
    </div>
@endsection
