<x-sidebar>

    <div class="goBackButtons">
        <h1>Tags for "{{$product->name}}"</h1>
        <a href="{{route('products')}}">
            <img src="{{asset('assets/images/back.jpg')}}" alt="">
        </a>
    </div>

    <h3>Current Tags</h3>
    <table class="adminTables">
   
        <tr>
            <th>Tag</th>
            <th>Action</th>
        </tr>

        @forelse ($product->tags as $tag)
        <tr>
            <td>{{$tag->name}}</td>
    
            <td class="tdForms">
                <form method="POST" action="{{ route('product.tags.delete', [$product, $tag]) }}">
                    <button type="submit">🗑️</button>
                </form>
            </td>
        </tr>
    
        @empty
            <tr>
                <td colspan="2">No tags assigned.</td>
            </tr>
        @endforelse
    </table>


    <h3>Add Tag</h3>
    <table class="adminTables">
    
            <tr>
                <th>Tag</th>
                <th>Action</th>
            </tr>

            @forelse ($tags as $tag)
            <tr>
                <td>{{$tag->name}}</td>
        
                <td class="tdForms">
                    <form method="POST" action="{{ route('product.tags.add', $product) }}">
                        <input type="hidden" name="tag_id" value="{{ $tag->id }}">
                        <button type="submit">➕</button>
                    </form>
                </td>
            </tr>
       
            @empty
                <tr>
                    <td colspan="2">No more tags available.</td>
                </tr>
            @endforelse
    </table>
</x-sidebar>