<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel DataTables </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/dataTables.bootstrap4.min.css">
    {{--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    --}}
    {{--
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css"> --}}

    {{--
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    --}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
        body {
            padding-top: 40px;
        }

    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- jQuery -->
    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    --}}


    <!-- DataTables -->
    <script src="/assets/js/jquery.dataTables.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script> --}}
    <!-- Bootstrap JavaScript -->
    <script src="/assets/js/dataTables.bootstrap4.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
    </script> --}}
    <!-- App scripts -->
    @stack('scripts')
    @yield('js')

</body>

</html>
