<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function categories(){
         $categories = Category::all();

        return view('categories.categories', compact('categories'));
    }

    function addCategory(Request $request){
        $fields = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ]);

        Category::create($fields);

        return redirect()->back();
    }

    function editCategory(Category $category){
        return view('categories.edit', compact('category'));
    }

    function updateCategory(Request $request, Category $category){

        $fields = $request->validate([
            'name' => ['required','string','max:255','unique:categories,name,' . $category->id],
        ]);

        $category->update($fields);

        return redirect()->route('categories');
    }

    function deleteCategory(Category $category){
        $category->delete();

        return redirect()->back();
    }

}
