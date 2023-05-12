<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WSQX8KR0FK"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-WSQX8KR0FK');
    </script>

    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">

    <!-- ========== SEO ========== -->
    <title>{{ $title }}</title>
    <meta property="og:url" content="{{ url()->current(); }}">
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $title }}" />
    <meta property="og:description" content="Boya Apartments offers 5-star luxury homes at up to 75% off the price of 5-star hotel rooms." name="description">
    <meta property="og:keyword" content="Shortstay Apartments, shortlet in Abuja, Shortstay apartment in Gwarinpa, one bedroom short let in abuja, two bedroom short let in abuja, cheap short let in abuja, serviced apartments for rent in abuja, serviced apartments in gwarinpa abuja, airbnb gwarinpa abuja">
    <meta property="og:image" content="{{ asset('frontend/images/boya.png') }}">
    <meta content="Boya Apartments offers 5-star luxury homes at up to 75% off the price of 5-star hotel rooms." name="description">
    <meta content="Shortstay Apartments, shortlet in Abuja, Shortstay apartment in Gwarinpa" name="keywords">
    <meta content="Noble Contracts" name="author">
    
    <!-- ========== FAVICON ========== -->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/favicon-apple.png') }}" />
   <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}">

    <!-- ========== STYLESHEETS ========== --> 
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/revolution/css/layers.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/revolution/css/settings.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('frontend/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/famfamfam-flags.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css">

    <!-- ========== ICON FONTS ========== -->
    <link href="{{ asset('frontend/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/fonts/flaticon.css') }}" rel="stylesheet">
    
    <!-- ========== GOOGLE FONTS ========== -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900%7cRaleway:400,500,600,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

     <script type="text/javascript" src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
</head>