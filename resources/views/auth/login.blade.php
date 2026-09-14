<x-layout title='Login'>

<h1>Login Form</h1>

<form action="{{ route('login') }}" method="POST">

<label for="email">Email</label>
<input type="email" name="email" value="{{old('email')}}">
@error('email')
    <p style="color: red;">{{$message}}</p>
@enderror

<label for="password">Password</label>
<input type="password" name="password">
@error('password')
    <p style="color: red;">{{$message}}</p>
@enderror

@error('error')
    <p style="color: red;">{{ $message }}</p>
@enderror

<button type="submit">Login</button>

</form>

</x-layout>