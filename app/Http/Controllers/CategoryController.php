<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            $categories =  Category::all();
        return view('admin.categories.index',compact('categories'));
        } else {
            return redirect()->route('login');
        }

    }


    public function create()
    {
        return view('admin.categories.add');
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;

        $category->save($request->all());
        // return redirect('home');
        return redirect()->route('categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact(['category']));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        $category=Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        //dung session de dua ra thong bao

        return redirect()->route('categories.index');

    }
    //xoa mem
    public  function softdeletes($id){
        // $this->authorize('delete', Category::class);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        return redirect()->route('categories.index');
    }
    public  function trash(){
        // dd(123);
        // $this->authorize('viewtrash', Category::class);
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'=> $categories];
        return view('admin.categories.trash', $param);
    }
    public function restoredelete($id){
        // $this->authorize('restore', Category::class);
        $categories=Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('category.trash');


    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if (!$search) {
            return redirect()->route('category.index');
        }
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->paginate(5);
        return view('admin.category.index', compact('categories'));
    }



}
