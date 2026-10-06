<x-sidebar>

    <x-go-back title="Edit Category" route="categories" />

    <form method="POST" action="{{ route('categories.update', $category) }}">

        <main class="productsMain">

            <div>
                <label for="name">Category Name</label>

                <input class="productsInputs" type="text" required name="name" value="{{ $category->name }}">
            </div>

        </main>

        <button class="productsButton" type="submit">Update Category</button>

    </form>

</x-sidebar>