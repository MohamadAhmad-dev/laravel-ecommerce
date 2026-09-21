<x-sidebar>
    <h1>Active Users</h1>
    <table class="usersTable">
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
                <td>{{$user->id==Auth::id()?'Active':'Inactive'}}</td>
                <td class="tdForms">

                    <form method="POST" action="{{route('user.toggle' , $user->id)}}">
                        <button type="submit">👑</button>
                    </form>

                    <form method="POST" action="{{route('user.delete' , $user->id)}}">
                        <button type="submit">🗑️</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>
</x-sidebar>