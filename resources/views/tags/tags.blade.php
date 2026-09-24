<x-sidebar>
    <h1>Tag Management</h1>
    
    <form method="POST" action="{{route('tags.add')}}">
        <main class="productsMain">
            <div>
                <label for="name">Tag Name</label>
                <input class="productsInputs" type="text" required name="name" placeholder="Enter tag name">
            </div>
        </main>
        
        <button class="productsButton" type="submit">Add Tag</button>
    </form>

    <table class="adminTables">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>

        @foreach ($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td class="tdForms">

                    <form method="GET" action="{{route('tags.edit',$tag)}}">
                        <button type="submit">✏️</button>
                    </form>
                    
                    <form method="POST" action="{{route('tags.delete',$tag)}}">
                        <button type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </table>
    
</x-sidebar>