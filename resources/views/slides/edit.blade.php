<x-sidebar>
    <x-go-back title="Edit Slide" route="slides"/>

    <form method="POST" action="{{route('slides.update',$slide)}}" enctype="multipart/form-data">
        <main class="productsMain">
            <div>
                <label for="title">Title</label>
                <input class="productsInputs" type="text" required name="title" placeholder="Enter slider title" value="{{$slide->title}}">
            </div>

             <div>
                <label for="description">Description</label>
                <input class="productsInputs" type="text" required name="description" placeholder="Enter slider Description" value="{{$slide->description}}">
            </div>

             <div>
                <label for="image">Image</label>
                <input type="file" name="image">
            </div>
        </main>
        
        <button class="productsButton" type="submit">Update Slide</button>
    </form>
</x-sidebar>