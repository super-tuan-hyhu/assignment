<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>@yield('title') | User</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- BASE CSS -->
    <link href="assetss/css/bootstrap.min.css" rel="stylesheet">
    <link href="assetss/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<!-- SPECIFIC CSS -->
    <link href="assetss/css/home_1.css" rel="stylesheet">
	<link href="assetss/css/product_page.css" rel="stylesheet">
	<link href="assetss/css/tuan.css" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="assetss/css/custom.css" rel="stylesheet">
	<link href="assetss/css/cart.css" rel="stylesheet">
	<link href="assetss/css/checkout.css" rel="stylesheet">
	<link href="assetss/css/error_track.css" rel="stylesheet">
	<link href="assetss/css/listing.css" rel="stylesheet">


</head>

<body>
	
	<div id="page">
    <!-- header -->
	@include('front.layout.header')
	<!-- /header -->
		
    <!-- main -->
	@yield('body')
	<!-- /main -->
	
	<!-- footer -->
	@include('front.layout.footer')
	<!--/footer-->
	</div>
	<!-- page -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="assetss/js/common_scripts.min.js"></script>
    <script src="assetss/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<!-- SPECIFIC SCRIPTS -->
	<script src="assetss/js/carousel-home.js"></script>
	<script src="assetss/js/cart.js"></script>
	<script src="assetss/js/jquery.cookiebar.js"></script>
	<script  src="assetss/js/carousel_with_thumbs.js"></script
	<script>
		$(document).ready(function() {
			'use strict';
			$.cookieBar({
				fixed: true
			});
		});
	</script>


</body>
</html>