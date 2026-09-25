<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function tags(){
        $tags = Tag::all();
        return view('tags.tags', compact('tags'));
    }

    function addTag(Request $request){
        $fields = $request->validate([
            'name' => ['required','string','max:255','unique:tags,name'],
        ]);

        Tag::create($fields);

        return redirect()->back();
    }

    function editTag(Tag $tag){
        return view('tags.edit', compact('tag'));
    }   

    function updateTag(Request $request, Tag $tag){
        $fields = $request->validate([
        'name' => ['required', 'string', 'max:255', 'unique:tags,name,' . $tag->id],
    ]);

        $tag->update($fields);

        return redirect()->route('tags');
    } 

    function deleteTag(Tag $tag){
        $tag->delete();
        return redirect()->back();
    }

    function productTagsPage(Product $product){
        $tag_ids = $product->tags()->pluck('tags.id');
        $tags = Tag::whereNotIn('id', $tag_ids)->get();

        return view('tags.product-tags', compact('product', 'tags'));
    }

    function addProductTag(Request $request,Product $product){
        $fields = $request->validate([
           'tag_id' => ['required','integer','exists:tags,id'] 
        ]);

        if(!$product->tags->contains($fields['tag_id'])){
            $product->tags()->attach($fields['tag_id']);
        }

        return redirect()->back();
    }

    function deleteProductTag(Product $product, Tag $tag){
        $product->tags()->detach($tag->id);
        return redirect()->back();
    }
}
