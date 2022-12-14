<!DOCTYPE html>
<html lang="en-US">
@include('web.layouts.head')
<body class="@yield('body-class', 'home page no-customize-support default-dark-logo pswp-light-skin responsive-ux page-template-masonry-body page-template-intro-above-list-body navi-hide page_from_top dark-logo header-sticky preload')">

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "279833508892468");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v15.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!--Page Loader-->
<div class="page-loading fullscreen-wrap visible">
    <div class="page-loading-inn">
        <div class="page-loading-transform">
            <div class="site-loading-logo"><img src="{{$global_config->app_loading ? asset($global_config->app_loading) : asset('img/demo/logo-loading.png')}}" alt="{{$global_config->og_title}}"/></div>
        </div>
    </div>
</div>

<!--Audio Player-->
<div id="jquery_jplayer" class="jp-jplayer"></div>

<!--Main wrap-->
<div class="wrap-all">

    <div id="wrap-outer">

        @include('web.layouts.header')

        @include('web.layouts.panel')

        <div id="wrap">
            @yield('content')
            @include('web.layouts.footer')
        </div>

        <div class="video-overlay modal"><span class="video-close"></span></div><!--end video-overlay-->

    </div><!--End wrap-outer-->

</div><!--End wrap-all-->

<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="pswp__bg"></div>

    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
<!-- jQuery Library -->
<script type='text/javascript' src='{{asset('js/library/jquery.min.js')}}'></script>
<!-- jQuery Library -->
<script type='text/javascript' src='{{asset('js/library/jquery-migrate.min.js')}}'></script>
<!-- Main Js Plugin -->
<script type='text/javascript' src='{{asset('js/main.min.js')}}'></script>
<!-- Air. Theme Elements js(big number) -->
<script type='text/javascript' src='{{asset('js/infographic.js')}}'></script>
<!-- Air. Theme Elements js -->
<script type='text/javascript' src='{{asset('js/theme.pagebuilder.js')}}'></script>
<!-- Air. Theme main js -->
<script type='text/javascript' src='{{asset('js/custom.theme.js')}}'></script>
@yield('js')
</body>
</html>
