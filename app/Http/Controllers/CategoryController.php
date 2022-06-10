<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('back-office.categories.index', compact('categories'));
    }

    public function create(){
        return view('back-office.categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000|dimensions:min_width=10,min_height=10',
        ]);

        if($request->hasFile('image')) {
            $image = 'null';
        }else{
            $image = null;
        }
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => strtolower(str_replace(' ', '_', $request->name)),
            'image' => $image,
        ]);

        toastr()->success('Category created successfully');
        return redirect()->route('categories.index');
    }

    public function edit(Category $category){
        return view('back-office.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000|dimensions:min_width=10,min_height=10',
        ]);

        if ($request->hasFile('image')) {
            $image = 'null';
        } else {
            $image = null;
        }
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        if($category->articles->count() > 0){
            toastr()->error('Can not delete category with articles');
            return redirect()->route('categories.index');
        }
        $category->delete();
        toastr()->success('Category deleted successfully');
        return redirect()->route('categories.index');
    }

}
