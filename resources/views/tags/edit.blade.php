<x-sidebar>
    
    <x-go-back title="Edit Tag" route="tags"/>

    <form method="POST" action="{{route('tags.update',$tag)}}">
        <main class="productsMain">
            <div>
                <label for="name">Tag Name</label>
                <input class="productsInputs" type="text" required name="name" placeholder="Enter tag name" value="{{$tag->name}}">
            </div>
        </main>
        
        <button class="productsButton" type="submit">Update Tag</button>
    </form>
</x-sidebar>