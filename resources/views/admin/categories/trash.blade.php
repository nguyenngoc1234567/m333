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


                            <form action="{{ route('category_destroy', $category->id) }}" method="post" >
                                @method('DELETE')
                                @csrf

                                <button onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?');"
                                    class ='btn btn-danger'  type="submit" >Xoá</button>
                            </form>
                            <form action="{{ route('category.restoredelete', $category->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <button onclick="return confirm('Bạn có chắc muốn khôi phục danh mục này không?');"
                            class ='btn btn-info'  type="submit" >Khôi phục</button>
                        </form>
                        </td>
                @endforeach
            </tbody>
        </table>
        {{-- <tr>{{ $categories->appends(request()->query()) }}</tr> --}}
    </div>


@endsection
