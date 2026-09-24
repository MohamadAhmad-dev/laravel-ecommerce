<x-sidebar>
    <h1>Deleted Users</h1>
    <table class="adminTables">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>Inactive</td>
                <td class="tdForms">

                    <form method="POST" action="{{route('user.restore' , $user->id)}}">
                        <button type="submit">♻️</button>
                    </form>

                    <form method="POST" action="{{route('user.forceDelete' , $user->id)}}">
                        <button type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</x-sidebar>