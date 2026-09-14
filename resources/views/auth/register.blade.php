<x-layout title='Register'>

<form class="loginSignupForm" action="{{ route('register') }}" method="POST">


    <h1>Register Form</h1>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" value="{{old('name')}}">
        @error('name')
            <p style="color: red;">{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{old('email')}}"">
        @error('email')
            <p style="color: red;">{{$message}}</p>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password">
        @error('password')
            <p style="color: red;">{{$message}}</p>
        @enderror
    </div>

    <button type="submit">Register</button>

</form>

</x-layout>