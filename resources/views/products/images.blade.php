<x-sidebar>

    <x-go-back :title=" 'Images for ' . $product->name" route="products"/>

    <div class="formDiv">
        <h3>Add New Image</h3>
    
        <form method="POST" action="{{route('product.images.add', $product)}}" enctype="multipart/form-data">
            <main class="productsMain">
                <div>
                    <label for="image">Select image</label>
                    <input type="file" name="image" required>
                </div>
            </main>
            <button class="productsButton" type="submit">Upload Image</button>
        </form>
    </div>

    <main id="porudctImagesMain">
        @foreach($images as $image)
        <section class="porudctImagesSection">
            <div class="productImage">
            <img src="{{asset('assets/images/'.$image->image)}}" alt="">
            </div>
            <div class="productImageIdButton">
                <p>Image #{{$image->id}}</p>
                <form method="POST" action="{{route('product.image.delete',$image)}}">
                    <button type="submit">Delete</button>
                </form>
            </div>
        </section>
        @endforeach
    </main>
</x-sidebar>