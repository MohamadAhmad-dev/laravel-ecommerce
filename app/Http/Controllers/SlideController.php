<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    function slides(){
        $slides = Slide::all();
        return view('slides.slides',compact('slides'));
    }

    function addSlide(Request $request){
        $fields = $request->validate([
            'title' => ['required','string','max:255'],
            'description' => ['required','string'],
            'image' => ['required','image','mimes:jpg,png,jpeg,webp','max:4000'],
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images'),$imageName);
        $fields['image'] = $imageName;

        Slide::create($fields);
        return redirect()->back();
    }

    function editSlide(Slide $slide){
        return view('slides.edit', compact('slide'));
    }

    function updateSlide(Request $request, Slide $slide){
        $fields = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4000'],
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'),$imageName);
            $fields['image'] = $imageName;
        }

        $slide->update($fields);
        return redirect()->route('slides');
    }

    function deleteSlide(Slide $slide){
        $imagePath = public_path('assets/images/' . $slide->image);

        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $slide->delete();
        return redirect()->back();
    }

}
