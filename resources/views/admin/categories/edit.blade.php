
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<form method="POST" action="{{route('categories.update',[$category->id])}}" enctype= "multipart/form-data" >
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-8 mx-auto">
         <div class="card">
           <div class="card-header py-3 bg-transparent">
              <h5 class="mb-0">Sửa danh mục</h5>
             </div>
           <div class="card-body">
             <div class="border p-3 rounded">
             <div class="row g-3">

               <div class="col-12">
                 <label class="form-label">name</label>
                 <input type="text" class="form-control" value="{{$category->name}}" name="name">
               </div>
            <input type="submit" value="Submit">

             </div>
            </div>
           </div>
        </div>
     </div>

</form>

