@extends('web.layouts.master')

@section('main')
    <div id="wrap-outer">

        <!--Header-->
        <header id="header" class="">

            <div id="header-main">

                <div class="container-fluid">

                            <span id="navi-trigger">
                                <span class="navi-trigger-text">
                                    <span class="navi-trigger-text-menu navi-trigger-text-inn">MENU</span>
                                    <span class="navi-trigger-text-close navi-trigger-text-inn">CLOSE</span>
                                </span>
                                <span class="navi-trigger-inn">
                                    <span class="navi-trigger-hamberg-line navi-trigger-hamberg-line1"></span>
                                    <span class="navi-trigger-hamberg-line navi-trigger-hamberg-line2"></span>
                                    <span class="navi-trigger-hamberg-line navi-trigger-hamberg-line3"></span>
                                </span>
                            </span>


                    <div class="navi-logo">

                        <div class="logo-wrap">
                            <div id="logo">
                                <a class="logo-a" href="index.html" title="Air Theme">
                                    <h1 class="logo-h1 logo-not-show-txt">Air Theme</h1>
                                    <img class="logo-image logo-dark" src="img/demo/logo_dark.png" alt="Air Theme"/>
                                    <span class="logo-light"><img class="logo-image" src="img/demo/logo_light.png"
                                                                  alt="Air Theme"/></span>
                                </a>
                            </div>
                        </div><!--End logo wrap-->

                    </div>

                </div>

            </div><!--End header main-->

        </header>

        <div id="menu-panel">

            <div class="menu-panel-inn fullscreen-wrap">

                <nav id="navi">

                    <div id="navi-wrap" class="menu-navi-wrap">

                        <ul class="menu clearfix">
                            <li class="menu-item current-menu-item current_page_item menu-item-has-children">
                                <a>Homes</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="home2.html">Home Alternative</a></li>
                                    <li class="menu-item"><a href="home3.html">Introduction in List</a></li>
                                    <li class="menu-item"><a href="home4.html">Introduction above Portfolio</a></li>
                                    <li class="menu-item"><a href="home5.html">Start with Slider</a></li>
                                    <li class="menu-item"><a href="home6.html">Left Intro + Right Filter</a></li>
                                    <li class="menu-item"><a href="home7.html">Open Items with Lightbox</a></li>
                                </ul>
                            </li>
                            <li id="menu-item-246" class="menu-item"><a href="page-news.html">News</a></li>
                            <li id="menu-item-256" class="menu-item"><a href="page-about.html">About</a></li>
                            <li id="menu-item-247" class="menu-item"><a href="page-contact.html">Contact</a></li>
                        </ul>

                    </div>

                </nav>

                <div id="menu-panel-bottom" class="container-fluid">

                    <div class="menu-panel-bottom-left col-md-3 col-sm-3 col-xs-3">

                        <div class="search-top-btn-class">
                            <span class="fa fa-search"></span>
                            <form class="search_top_form" method="get" action="#">
                                <input type="search" id="s" name="s" class="search_top_form_text"
                                       placeholder="Type and Hit Enter">
                            </form>
                        </div>

                    </div>

                    <div class="menu-panel-bottom-right col-md-9 col-sm-9 col-xs-9">

                        <div class="socialmeida-mobile">

                            <ul class="socialmeida clearfix">
                                <li class="socialmeida-li">
                                    <a title="Facebook" href="https://www.facebook.com/uiueux" class="socialmeida-a">
                                        <span class=""></span> <span class="socialmeida-text">Facebook</span>
                                    </a>
                                </li>

                                <li class="socialmeida-li">
                                    <a title="Twitter" href="https://twitter.com/uiueux" class="socialmeida-a">
                                        <span class=""></span> <span class="socialmeida-text">Twitter</span>
                                    </a>
                                </li>

                                <li class="socialmeida-li">
                                    <a title="Behance" href="https://www.behance.net/bwsm" class="socialmeida-a">
                                        <span class=""></span> <span class="socialmeida-text">Behance</span>
                                    </a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div><!--End #menu-panel-->


        <!-- Main Content Wrap -->
        <div id="wrap">

            <!-- Top Slider -->
            <div class="top-slider top-slider-text">

                <div class="text-slider-inn middle-ux">
                    <h1 class="slider-headding slider-headding-1 headding-with-bg"
                        data-bg="http://placehold.it/836x488">Air. Design.</h1>

                    <div class="slider-con">
                        <div class="slider-con-inn">
                            <p>A <em>creative</em> design agency based in NewYork. <em>We</em> do live art,
                                illustration, web design, App design and everything in between.</p>
                        </div>
                    </div>
                </div>

            </div><!-- End top-slider -->

            <!-- Main Content : List, text content ... -->
            <div id="content">

                <div class="content_wrap_outer fullwrap-layout">

                    <div id="content_wrap" class="">

                        <!--Portfolio Template-->
                        <div
                            class="container-masonry ux-portfolio-spacing-40 ux-portfolio-3col container ux-has-filter filter-center"
                            data-col="3" data-spacer="40" data-template="intro-above">

                            <!--Filter-->
                            <div class="clearfix filters">

                                <ul class="filters-ul container">
                                    <li class="filters-li active"><a id="all" class="filters-a" href="#"
                                                                     data-filter="*">All<span
                                                class="filter-num">11</span></a></li>
                                    <li class="filters-li"><a class="filters-a" data-filter=".filter_branding" href="#"
                                                              data-catid="4" data-pageid="123">Branding<span
                                                class="filter-num">7</span></a></li>
                                    <li class="filters-li"><a class="filters-a" data-filter=".filter_illustration"
                                                              href="#" data-catid="7"
                                                              data-pageid="123">Illustration<span
                                                class="filter-num">3</span></a></li>
                                    <li class="filters-li"><a class="filters-a" data-filter=".filter_photography"
                                                              href="#" data-catid="25"
                                                              data-pageid="123">Photography<span
                                                class="filter-num">1</span></a></li>
                                </ul>

                            </div><!--End filter-->

                            <div class="masonry-list masonry-grid grid-mask-filled-left">

                                <section
                                    class="grid-item grid-item-small filter_branding filter_illustration filter_works">

                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-fullscreen-slider.html" title="Sofisticada"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Branding"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_branding">Branding</a> <a
                                                        href="#" title="View all posts in Illustration"
                                                        class="grid-item-cate-a" data-filter=".filter_illustration">Illustration</a></span>
                                                <h2 class="grid-item-tit"><a href="project-item-fullscreen-slider.html"
                                                                             title="Sofisticada"
                                                                             class="grid-item-tit-a">Sofisticada</a>
                                                </h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 75.384615384615%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section class="grid-item grid-item-small filter_photography filter_works"
                                         data-postid="30">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-standard-text-center.html"
                                               title="Base Visual Identity"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Photography"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_photography">Photography</a></span>
                                                <h2 class="grid-item-tit"><a
                                                        href="project-item-standard-text-center.html"
                                                        title="Base Visual Identity" class="grid-item-tit-a">Base Visual
                                                        Identity</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 75.384615384615%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section class="grid-item grid-item-long grid-item—width2 filter_works"
                                         data-postid="48">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-standard-start-from-gallery.html" title="Raw"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"></span>
                                                <h2 class="grid-item-tit"><a
                                                        href="project-item-standard-start-from-gallery.html" title="Raw"
                                                        class="grid-item-tit-a">Raw</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 37.439024390244%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/820x307"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section class="grid-item grid-item-tall filter_branding filter_works" data-postid="97">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-standard-text-left.html" title="Alfonza Woolwear"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Branding"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_branding">Branding</a></span>
                                                <h2 class="grid-item-tit"><a href="project-item-standard-text-left.html"
                                                                             title="Alfonza Woolwear"
                                                                             class="grid-item-tit-a">Alfonza
                                                        Woolwear</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 150.09523809524%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/525x788"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section
                                    class="grid-item grid-item-small filter_branding filter_illustration filter_works"
                                    data-postid="198">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-slider.html" title="Red Room"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Branding"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_branding">Branding</a> <a
                                                        href="#" title="View all posts in Illustration"
                                                        class="grid-item-cate-a" data-filter=".filter_illustration">Illustration</a></span>
                                                <h2 class="grid-item-tit"><a href="project-item-slider.html"
                                                                             title="Red Room" class="grid-item-tit-a">Red
                                                        Room</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 75.384615384615%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section class="grid-item grid-item-small filter_branding filter_works"
                                         data-postid="16">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-2cols-gallery-right-filled.html" title="Bloc Brands"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Branding"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_branding">Branding</a></span>
                                                <h2 class="grid-item-tit"><a
                                                        href="project-item-2cols-gallery-right-filled.html"
                                                        title="Bloc Brands" class="grid-item-tit-a">Bloc Brands</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 75.384615384615%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section class="grid-item grid-item-small filter_branding filter_works" data-postid="1">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-2cols-gallery-left-filled.html" title="Look Addict"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Branding"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_branding">Branding</a></span>
                                                <h2 class="grid-item-tit"><a
                                                        href="project-item-2cols-gallery-left-filled.html"
                                                        title="Look Addict" class="grid-item-tit-a">Look Addict</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 66.615384615385%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section class="grid-item grid-item-small filter_branding filter_works"
                                         data-postid="61">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-2cols-gallery-right.html" title="Hikeshi"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Branding"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_branding">Branding</a></span>
                                                <h2 class="grid-item-tit"><a
                                                        href="project-item-2cols-gallery-right.html" title="Hikeshi"
                                                        class="grid-item-tit-a">Hikeshi</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 75.384615384615%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section
                                    class="grid-item grid-item-small filter_illustration filter_uncategorized filter_works"
                                    data-postid="379">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-standard-text-center.html" title="Branch Creative"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"><a href="#"
                                                                                title="View all posts in Illustration"
                                                                                class="grid-item-cate-a"
                                                                                data-filter=".filter_illustration">Illustration</a></span>
                                                <h2 class="grid-item-tit"><a
                                                        href="project-item-standard-text-center.html"
                                                        title="Branch Creative" class="grid-item-tit-a">Branch
                                                        Creative</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 75.384615384615%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                                <section class="grid-item grid-item-small filter_uncategorized filter_works"
                                         data-postid="511">
                                    <div class="grid-item-inside">
                                        <div class="grid-item-con">
                                            <a href="project-item-standard-grid.html" title="Asis Logos"
                                               class="grid-item-mask-link grid-item-open-url"></a>

                                            <div class="grid-item-con-text">
                                                <span class="grid-item-cate"></span>
                                                <h2 class="grid-item-tit"><a href="project-item-standard-grid.html"
                                                                             title="Asis Logos" class="grid-item-tit-a">Asís
                                                        Logos</a></h2>
                                            </div>
                                        </div>

                                        <div class="brick-content ux-lazyload-wrap"
                                             style=" padding-top: 75.384615384615%;">
                                            <div class="ux-lazyload-bgimg ux-background-img"
                                                 data-bg="http://placehold.it/650x490"></div>
                                        </div>

                                    </div><!--End inside-->

                                </section>

                            </div><!--End masonry-list-->

                        </div><!-- End container-masonry -->

                    </div><!-- End #content_wrap-->

                </div><!-- End content_wrap_outer-->

            </div><!--End #content-->

            <footer id="footer" class="footer-cols-layout">

                <div class="footer-info">
                    <div class="footer-container">
                        <div class="span6">
                            <div id="logo-footer">
                                <a href="index.html" title="Air Theme">
                                    <img class="logo-footer-img" src="img/demo/logo_dark.png" alt="Air Theme"/>
                                </a>
                            </div>
                        </div>

                        <div class="span6">
                            <div class="footer-social">
                                <ul class="socialmeida clearfix">

                                    <li class="socialmeida-li">
                                        <a title="Facebook" href="https://www.facebook.com/uiueux"
                                           class="socialmeida-a">
                                            <span class=""></span> <span class="socialmeida-text">Facebook</span>
                                        </a>
                                    </li>

                                    <li class="socialmeida-li">
                                        <a title="Twitter" href="https://twitter.com/uiueux" class="socialmeida-a">
                                            <span class=""></span> <span class="socialmeida-text">Twitter</span>
                                        </a>
                                    </li>

                                    <li class="socialmeida-li">
                                        <a title="Behance" href="https://www.behance.net/bwsm" class="socialmeida-a">
                                            <span class=""></span> <span class="socialmeida-text">Behance</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid back-top-wrap">
                    <div id="back-top"></div>
                </div>

            </footer>

        </div><!--End #wrap -->

        <div class="video-overlay modal"><span class="video-close"></span></div><!--end video-overlay-->

    </div><!--End wrap-outer-->
@endsection
