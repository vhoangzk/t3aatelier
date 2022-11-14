<!DOCTYPE html>
<html lang="en-US">
@include('web.layouts.header')
<body
    class="home page no-customize-support default-dark-logo pswp-light-skin responsive-ux page-template-masonry-body page-template-intro-above-list-body navi-hide page_from_top dark-logo header-sticky preload">

<!--Page Loader-->
<div class="page-loading fullscreen-wrap visible">
    <div class="page-loading-inn">
        <div class="page-loading-transform">
            <div class="site-loading-logo"><img src="img/demo/logo-loading.png" alt="Air Theme"/></div>
        </div>
    </div>
</div>

<!--Audio Player-->
<div id="jquery_jplayer" class="jp-jplayer"></div>

<!--Main wrap-->
<div class="wrap-all">

    @yield('main')

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

@include('web.layouts.footer')
</body>
</html>
