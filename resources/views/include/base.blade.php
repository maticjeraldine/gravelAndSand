<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Azarcon Corp.</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Bootstrap -->
    <script src="/plugins/js/bootstrap.bundle.min.js"></script>

    <!-- Styles -->
    <style>
        html,
        .na1 {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background-image:url('{{ asset('image/car.png') }}');
            background-size: contain;
            background-repeat: no-repeat;
        }

        .body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }


        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        /* rounded btn */
        .btnr {
            border-radius: 100px;
        }

        .btnr1 {
            background: white;
            border: 1px solid #FFA41B;
            box-sizing: border-box;
            border-radius: 100px;
        }

        .welcome {
            width: auto;
            height: 43px;
            font-family: Alegreya Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 45px;
            border: none;
            color: #000000;
            margin-left: 17%;
            margin-top: 15%;
        }

        .logo {
            font-family: Roboto;
            font-style: normal;
            font-weight: bold;
            font-size: 20px;
            line-height: 19px;
        }

        .quote {
            font-family: Alegreya Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 14px;

        }

        .label {
            font-size: 100%;
            padding-right: 5%
        }

        .bg {
            background: radial-gradient(88.57% 95.51% at 18.52% 141.9%, rgba(244, 244, 244, 0) 98.92%, #FFA41B 99.35%);
            border: 1px solid #FFA41B;
            box-sizing: border-box;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }

        .bg p {
            color: black;
            font-family: Rockwell Extra Bold;
            font-style: normal;
            font-weight: 800;
            font-size: 30px;
            max-width: 10vw;
        }

        .bg input {
            border-color: transparent transparent #000000;
            background-color: transparent;

        }

        .bg input::placeholder {
            color: black;
            font-family: Roboto;
            font-style: normal;
            font-weight: 300;
            font-size: 15px;
        }

        .bg input:focus {
            -moz-box-shadow: 0 0 0 transparent;
            border-color: transparent transparent #000000;
            background-color: transparent;

        }

        .nav a {
            text-decoration: none;
            color: black;
            font-weight: 300;
        }

        .prd {
            border-color: #FFA41B;
            padding: 1%;
            box-shadow: 5px 5px grey;
        }
    </style>
</head>


{{-- navigation bar --}}
@include('include.navbar')

@yield('bodyContent')




{{-- MODAL SCRIPT --}}
<SCript>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</SCript>
</body>

</html>