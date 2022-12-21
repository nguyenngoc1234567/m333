<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories =  Category::all();
        return view('admin.categories.index',compact('categories'));
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
        $category = Category::findOrFail($id);
        $category->delete();
        //dung session de dua ra thong bao

        return redirect()->route('categories.index');
    
    }
}
