<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <base href="{{asset('')}}">
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="frontend/css/price-range.css" rel="stylesheet">
    <link href="frontend/css/animate.css" rel="stylesheet">
	<link href="frontend/css/main.css" rel="stylesheet">
	<link href="frontend/css/responsive.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">



    <!--[if lt IE 9]>


    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="frontend/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	@include('frontend.header')

	@yield('content')

	@include('frontend.footer')



    <script src="frontend/js/jquery.js"></script>
	<script src="frontend/js/bootstrap.min.js"></script>
	<script src="frontend/js/jquery.scrollUp.min.js"></script>
	<script src="frontend/js/price-range.js"></script>
    <script src="frontend/js/jquery.prettyPhoto.js"></script>
    <script src="frontend/js/main.js"></script>
{{--    <script src="sweetalert2.all.min.js"></script>--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('script')

<script type="text/javascript">
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            // Swal.fire('Any fool can use a computer');

        })
    })
</script>
</body>

