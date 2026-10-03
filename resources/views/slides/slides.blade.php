<x-sidebar>
    <h1>Slider Management</h1>

     <form method="POST" action="{{route('slides.add')}}" enctype="multipart/form-data">
        <main class="productsMain">
            <div>
                <label for="title">Title</label>
                <input class="productsInputs" type="text" required name="title" placeholder="Enter slider title">
            </div>

             <div>
                <label for="description">Description</label>
                <input class="productsInputs" type="text" required name="description" placeholder="Enter slider Description">
            </div>

             <div>
                <label for="image">Image</label>
                <input type="file" required name="image">
            </div>
        </main>
        
        <button class="productsButton" type="submit">Add Slide</button>
    </form>

    <table class="adminTables">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        @foreach ($slides as $slide)
            <tr>
                <td>{{$slide->id}}</td>
                <td>{{$slide->title}}</td>
                <td>{{$slide->description}}</td>
                <td>
                    <img src="{{asset('assets/images/' . $slide->image)}}" alt="{{$slide->title}}">
                </td>
                <td class="tdForms">

                    <form method="GET" action="{{route('slides.edit',$slide)}}">
                        <button type="submit">✏️</button>
                    </form>
                    
                    <form method="POST" action="{{route('slides.delete',$slide)}}">
                        <button type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </table>
</x-sidebar>