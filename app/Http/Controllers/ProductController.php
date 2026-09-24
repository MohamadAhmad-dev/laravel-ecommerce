<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function products(){
        $products = Product::all();

        return view('products.products',compact('products'));
    }

    function addProduct(Request $request){
        $fields = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            'details' => ['nullable','string'],
            'price' => ['required','numeric','min:0'],
            'quantity' => ['nullable','integer','min:0'],
            'image' => ['required','image','mimes:jpeg,png,jpg,webp','max:4000'],
            'is_featured' => ['nullable','boolean'],
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('assets/images'),$imageName);
        $fields['image'] = $imageName;

        Product::create($fields);

        return redirect()->back();
    }

    function deleteProduct(Product $product){
        $product->delete();
        return redirect()->back();
    }

    function editProduct(Product $product){
        return view('products.edit', compact('product'));
    }
    
    function updateProduct(Request $request, Product $product){
        $fields = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            'details' => ['nullable','string'],
            'price' => ['required','numeric','min:0'],
            'quantity' => ['nullable','integer','min:0'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp','max:4000'],
            'is_featured' => ['nullable','boolean'],
        ]);

        if($request->hasFile('image')){

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images'),$imageName);
            $fields['image'] = $imageName;

        }

        $fields['is_featured'] = $request->boolean('is_featured');

        $product->update($fields);

        return redirect()->route('products');
    }

    function productImages(Product $product){
        $images = $product->images;
        return view('products.images', compact('product','images'));
    }

    function addImage(Request $request, Product $product){
        $fields = $request->validate([
            'image' => ['required','image','mimes:jpg,jpeg,png,webp','max:4000'],
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('assets/images'),$imageName);
        $fields['image']=$imageName;
        $product->images()->create($fields);

        return redirect()->route('product.images',$product);

    }

    function deleteImage(ProductImages $image){
        $imagePath = public_path('assets/images/'.$image->image);

        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $image->delete();

        return redirect()->back();
    }
}   
