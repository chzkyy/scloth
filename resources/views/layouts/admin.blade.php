<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Scloth">
    <meta name="author" content="Scloth">
    <title>@yield('title')</title>

    @include('includes.admin.style')
</head>

<body class="bg-gradient-primary">
    @yield('content')
    @include('includes.admin.script')
</body>

</html>