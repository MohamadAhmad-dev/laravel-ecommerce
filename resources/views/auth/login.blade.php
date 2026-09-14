<x-layout title='Login'>

<form class="loginSignupForm" action="{{ route('login') }}" method="POST">

 
    <h1>Login Form</h1>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="{{old('email')}}">
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

        @error('error')
            <p style="color: red;">{{ $message }}</p>
        @enderror
    </div>


    <button type="submit">Login</button>
    
</form>

</x-layout>