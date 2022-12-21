<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<form method="POST" action="{{route('products.update',[$product->id])}}" enctype= "multipart/form-data" >
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
                 <label class="form-label">Tên</label>
                 <input type="text" class="form-control" value="{{$product->name}}" name="name">
               </div>
               <div class="col-12">
                 <label class="form-label">Giá</label>
                 <input type="text" class="form-control" value="{{$product->price}}" name="price">
               </div>
               <div class="col-12">
                 <label class="form-label">Danh mục</label>
                 <select name="category_id" id="" class="form-control">
                    <option value="">--Vui lòng chọn--</option>
                    @foreach ($categories as $category)
                    <option
                        <?= $category->id == $product->category_id ? 'selected' : '' ?>
                        value="{{ $category->id }}">
                        {{ $category->name }}</option>
                @endforeach
                </select>
               </div>
               <div class="col-12">
                <label for="inputTitle">Ảnh Sản Phẩm</label><br>
                <input accept="image/*" type='file' id="imgInp" name="image" /><br><br>
                <img type="hidden" width="90px" height="90px" id="blah1"
                    src="{{ asset('public/uploads/product/' .$product->image) ?? $request->inputFile }}" alt="" /> <br>
             </div>
            <input type="submit" value="Submit">

             </div>
            </div>
           </div>
        </div>
     </div>

</form>
