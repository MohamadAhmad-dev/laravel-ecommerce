<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <link rel="stylesheet" href="{{asset('assets/styles/style.css')}}">

</head>
<body>
    
    <main id="dashboardMain">

        <section id="dashboardSidebar">
            <img src="{{asset('assets/images/admin.png')}}">
            <div>
                <h2>OVERVIEW</h2>
                <a href="">Admin Dashboard</a>
            </div>

            <div>
                <h2>USERS</h2>
                <a href="">All Users</a>
                <a href="">Deleted Users</a>
                <a href="">Active Users</a>
            </div>

            <div>
                <h2>STORE</h2>
                <a href="">Slider Management</a>
                <a href="">Products Management</a>
                <a href="">Tag Management</a>
            </div>

        </section>

        <section>
            {{$slot}}
        </section>
</main>

</body>
</html>
