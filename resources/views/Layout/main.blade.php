<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" name="description">
    <meta content="AdminKit" name="author">
    <meta
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
        name="keywords">

    <link href="https://fonts.gstatic.com" rel="preconnect">

    <link href="https://demo-basic.adminkit.io/pages-blank.html" rel="canonical" />

    <title>Dashboard Admin</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="wrapper">
        @include('Layout.sidebar')

        <div class="main">
            @include('Layout.topbar')

            <main class="content">
                @yield('content')
            </main>

            @yield('footer')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
