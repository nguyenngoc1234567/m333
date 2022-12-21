@extends('admin.layouts.master')
@section('content')
<form action="{{route('categories.store')}}" method = 'post'>
    @csrf
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <div class="row">
        <div class="col-lg-8 mx-auto">
         <div class="card">
           <div class="card-header py-3 bg-transparent">
              <h5 class="mb-0">THÊM MỚI DANH MỤC </h5>
             </div>
           <div class="card-body">
             <div class="border p-3 rounded">
             <form class="row g-3">
               <div class="col-12">
                 <label class="form-label">name</label>
                 <input type="name" class="form-control" name="name" >
             </form>
             <div class="col-12">
                <button class="btn btn-primary px-4">Submit Item</button>
              </div>
             </div>
            </div>
           </div>
        </div>
     </div><!--end row-->
</form>
@endsection
