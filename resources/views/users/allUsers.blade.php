<x-sidebar>
    <h1>All Users</h1>
    <table class="usersTable">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
        
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->id==Auth::id()?'Active':'Inactive'}}</td>
            @endforeach
    </table>
</x-sidebar>