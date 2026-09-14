<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/styles/style.css')}}">
    <title>{{$title}}</title>
</head>
<body>
    <x-Navbar/>

    {{$slot}}

    <x-Footer/>
</body>
</html>