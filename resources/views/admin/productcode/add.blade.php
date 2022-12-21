@extends('admin.layouts.master')
@section('content')
<form action="{{route('productcode.store')}}"  method = 'post'>
    @csrf
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <div class="row">
        <div class="col-lg-8 mx-auto">
         <div class="card">
           <div class="card-header py-3 bg-transparent">
              <h5 class="mb-0">THÊM MỚI DANH MỤC CHI TIÊU</h5>
             </div>
           <div class="card-body">
             <div class="border p-3 rounded">
             <div class="row g-3">
               <div class="col-12">
                 <label class="form-label">code</label>
                 <input type="text" class="form-control" name="code" >
               </div>
             <div class="row g-3">
               <div class="col-12">
                 <label class="form-label">product_id</label>
                 <input type="number" class="form-control" name="product_id" >
               </div>

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
