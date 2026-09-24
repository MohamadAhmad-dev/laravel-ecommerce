<x-sidebar>
    <h1>Products Management</h1>

    <form method="POST" action="{{route('product.add')}}" enctype="multipart/form-data">

        <main class="productsMain">
            <div>
                <label for="name">Name</label>
                <input class="productsInputs" type="text" name="name" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea class="productsInputs" name="description" required></textarea>
            </div>

            <div>
                <label for="details">Details</label>
                <textarea class="productsInputs" name="details"></textarea>
            </div>

            <div>
                <label for="price">Price</label>
                <input class="productsInputs" type="number" name="price" required>
            </div>

            <div>
                <label for="quantity">Quantity</label>
                <input class="productsInputs" type="number" name="quantity">
            </div>
            
            <div>
                <label for="image">Image</label>
                <input class="productsInputs" type="file" name="image" required>
            </div>

            </main>

            <div id="isFeatured">
                <label for="is_featured">Featured</label>
                <input type="checkbox" name="is_featured" value="1">
            </div>
        
            <button class="productsButton" type="submit">Add Product</button>
    </form>
    <table class="adminTables">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Description</th>
            <th>Featured</th>
            <th>Action</th>
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <img src="{{asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}">
                </td>
                <td>{{$product->description}}</td>
                <td>{{$product->is_featured?'Yes' : 'No'}}</td>\
                <td class="tdForms">
                    <form method="GET" action="{{route('product.images', $product)}}">
                        <button type="submit">🖼️</button>
                    </form>

                    <form method="GET" action="{{route('product.edit', $product)}}">
                        <button type="submit">✏️</button>
                    </form>
                    
                    <form method="POST" action="{{route('product.delete', $product)}}">
                        <button type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
    </table>
</x-sidebar>