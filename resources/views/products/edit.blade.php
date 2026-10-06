<x-sidebar>

    <x-go-back :title=" 'Edit ' . $product->name" route="products"/>

    <form method="POST" action="{{route('product.update', $product)}}" enctype="multipart/form-data">

        <main class="productsMain">
            <div>
                <label for="name">Name</label>
                <input class="productsInputs" type="text" name="name" value="{{$product->name}}" required>
            </div>

            <div>
                <label for="description">Description</label>
                <textarea class="productsInputs" name="description" required>{{$product->description}}</textarea>
            </div>

            <div>
                <label for="details">Details</label>
                <textarea class="productsInputs" name="details">{{$product->details}}</textarea>
            </div>

            <div>
                <label for="price">Price</label>
                <input class="productsInputs" type="number" name="price" value="{{$product->price}}" required>
            </div>

            <div>
                <label for="quantity">Quantity</label>
                <input class="productsInputs" type="number" name="quantity" value="{{$product->quantity}}">
            </div>
            
            <div>
                <label>Current Image</label>
                <img id="editProductImage" src="{{asset('assets/images/'. $product->image)}}" alt="{{$product->name}}">
            </div>

            <div>
                <label for="image">Change Image</label>
                <input type="file" name="image">
            </div>

            <div>
                <label for="category_id">Category</label>

                <select class="productsInputs" name="category_id" required>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected($category->id == $product->category_id)>{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>

            </main>

            <div id="isFeatured">
                <label for="is_featured">Featured</label>
                <input type="checkbox" name="is_featured" value="1" {{ $product->is_featured ? 'checked' : '' }}>
            </div>
        
            <button class="productsButton" type="submit">Update Product</button>
    </form>

</x-sidebar>
