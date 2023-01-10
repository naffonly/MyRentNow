<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Rental Barang Elektronik</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link href="{{ asset('fonts/material-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/Navbar-Centered-Links-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vanilla-zoom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    
    <style>
        .bg-section{
            background-size: 100% 100%;
            background-image: url("{{ asset('img/welcomepage.png') }}") ;
            background-repeat: no-repeat;
          
        }
        .btn-outline-info{
            color: #0dcaf0
        }
        .btn-outline-info:hover{
            color: white;
        }
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }
        .card{
            border: none;
        }
        .hero{
            height: 80%;
            background-size: 100% 80%;
            width: 100%;
            background-image: url("{{asset('img/about.png') }}");
            background-repeat: no-repeat;
            
          
        }
        .btn-outline-light:hover {
        background: #0eabbd;
        color: white;
        }
    </style>
    <!-- Favicons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    @yield('main-content')
</body>
</html>