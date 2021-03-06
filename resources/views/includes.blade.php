 <!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" type="text/css" href="{{Asset('css/bootstrap/css/bootstrap.css')}}">
        @yield('head')
        <script>
                window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
                ]); ?>
        </script>
</head>
<body>
        @section('sidebar')

        @show
        @yield('content')
    <!-- <script src="/js/app.js"></script> -->
</body>
</html>
