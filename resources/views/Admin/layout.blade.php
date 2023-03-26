<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">


</head>

<body>

    <div class="main-container">
        <x-Admin.sidebar />
        <main>
            <div class="content">
                @yield('adminmain')
            </div>
        </main>
    </div>

</body>

</html>
