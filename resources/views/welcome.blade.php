<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/slick/slick-theme.css"/>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .slider img {
            height: 100vh;
            width: auto;
            margin: 0 auto; /* it centers any block level element */
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

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>


<div class="content text-center">
    <div class="slider">
        <div><img src="/img/img1.png" alt=""></div>
        <div><img src="/img/img2.jpg" alt=""></div>
        <div><img src="/img/img6.png" alt=""></div>
        <div><img src="/img/img3.jpg" alt=""></div>
        <div><img src="/img/img7.png" alt=""></div>
        <div><img src="/img/img6.png" alt=""></div>
        <div><img src="/img/img4.jpg" alt=""></div>
        <div><img src="/img/img5.png" alt=""></div>
        <div><img src="/img/img6.png" alt=""></div>
    </div>
</div>


<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/slick/slick.min.js"></script>

<script>
    $('.slider').slick({
        speed: 150,
        centerMode: true,
        infinite: true,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 5000,
        fade: true,
    });
</script>
</body>
</html>
