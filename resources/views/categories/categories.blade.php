<x-sidebar>

    <h1>Category Management</h1>

    <form method="POST" action="{{route('categories.add')}}">
        
        <main class="productsMain">

            <div>
                <label for="name">Category Name</label>
                <input class="productsInputs" type="text" required name="name" placeholder="Enter category name">
            </div>

        </main>

        <button class="productsButton" type="submit">Add Category</button>
    </form>

    <table class="adminTables">

        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>

        @forelse ($categories as $category)

            <tr>

                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                
                <td class="tdForms">

                    <form method="GET" action="{{ route('categories.edit', $category) }}">
                        <button type="submit">✏️</button>
                    </form>

                    <form method="POST" action="{{ route('categories.delete', $category) }}">

                        <button type="submit">🗑️</button>
                    </form>

                </td>

            </tr>

            @empty
            <tr>
                <td colspan="3">No categories available!</td>
            </tr>
        @endforelse

    </table>

</x-sidebar>