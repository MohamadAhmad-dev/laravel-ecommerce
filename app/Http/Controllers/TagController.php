<?php

namespace App\Http\Controllers;

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
}
