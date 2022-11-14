<head>
    <title>Air. Lightweight Portfolio &amp; Photography HTML Theme </title>
    @include('web.layouts.meta')
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('img/apple-touch-icon-114x114.png')}}">

    <!-- Google Fonts -->
    <link rel='stylesheet'
          href='https://fonts.googleapis.com/css?family=Poppins%3A400%2C300%7CLibre+Baskerville%3Aregular%2Citalic%2C700'
          type='text/css' media='all'/>

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='{{asset('css/bootstrap.css')}}' type='text/css' media='screen'/>

    <!-- Font Icon CSS -->
    <link rel='stylesheet' href='{{asset('css/font-awesome.min.css')}}' type='text/css' media='screen'/>

    <!-- Owl Carousel Plugin CSS -->
    <link rel='stylesheet' href='{{asset('css/owl.carousel.css')}}' type='text/css' media='screen'/>

    <!-- Lightbox Plugin CSS -->
    <link rel='stylesheet' href='{{asset('css/photoswipe.css')}}' type='text/css' media='screen'/>

    <!-- Lightbox Plugin Skin CSS -->
    <link rel='stylesheet' href='{{asset('css/skin/photoswipe/default/default-skin.css')}}' type='text/css'
          media='screen'/>

    <!-- Air. Theme Elements CSS -->
    <link rel='stylesheet' href='{{asset('css/pagebuild.css')}}' type='text/css' media='screen'/>

    <!-- Air. Theme Main CSS -->
    <link rel='stylesheet' href='{{asset('css/style.css')}}' type='text/css' media='screen'/>

    @stack('css')
    <!-- IE hack -->
<!--[if lte IE 9]>
    <link rel='stylesheet' id='cssie9'  href='{{asset('css/ie.css')}}' type='text/css' media='screen' />
    <![endif]-->

<!--[if lte IE 9]>
    <script type="text/javascript" src="{{asset('js/ie.js')}}"></script>
    <![endif]-->

    <!--[if lte IE 8]>
    <div style="width: 100%;" class="messagebox_orange">Your browser is obsolete and does not support this webpage.
        Please use newer version of your browser or visit <a href="http://www.ie6countdown.com/" target="_new">Internet
            Explorer 6 countdown page</a> for more information.
    </div>
    <![endif]-->

</head>
