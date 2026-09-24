<x-sidebar>
    <div class="goBackButtons">
        <h1>Edit Tag</h1>
        <a href="{{route('tags')}}">
            <img src="{{asset('assets/images/back.jpg')}}" alt="">
        </a>
    </div>

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