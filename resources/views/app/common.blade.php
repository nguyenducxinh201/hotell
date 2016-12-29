<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{Asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{Asset('css/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{ Asset('js/jquery/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ Asset('js/validate/jquery.validate.js') }}"></script>
    <!-- <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
    <script type="text/javascript" src="{{Asset('jqueryui112/jquery-ui.js')}}"></script>
    @yield('head')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @yield('content')
</body>
</html>