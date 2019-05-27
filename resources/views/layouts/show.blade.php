<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Loja Virtual">
    <meta name="author" content="SnakeWar">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Loja Virtual</title>

    <!-- Scripts -->



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="icon" href="http://localhost/favicon.png" />

    <!-- Styles -->

    <!-- Bootstrap core CSS-->
    <link href="http://localhost/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Custom fonts for this template-->

    <!-- Custom styles for this template-->


</head>
<body class="" id="page-top">
<main class="py-4">
    @yield('content')
</main>
</body>
</html>