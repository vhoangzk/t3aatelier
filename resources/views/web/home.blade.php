@extends('web.layouts.master')

@section('content')

    <!-- Top Slider -->
    <div class="top-slider top-slider-text">
        @foreach($banners as $banner)
            <div class="text-slider-inn middle-ux">
                <h1 class="slider-headding slider-headding-1 headding-with-bg"
                    data-bg="{{$banner->image}}">{{$banner->title}}</h1>

                <div class="slider-con">
                    <div class="slider-con-inn">
                        {{$banner->description}}
                    </div>
                </div>
            </div>
        @endforeach

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
                            <li class="filters-li active">
                                <a id="all" class="filters-a" href="#"
                                   data-filter="*">All<span
                                        class="filter-num">11</span></a>
                            </li>
                            <li class="filters-li">
                                <a class="filters-a" data-filter=".filter_branding" href="#"
                                   data-catid="4" data-pageid="123">Branding<span
                                        class="filter-num">7</span></a>
                            </li>
                            <li class="filters-li">
                                <a class="filters-a" data-filter=".filter_illustration"
                                   href="#" data-catid="7"
                                   data-pageid="123">Illustration<span
                                        class="filter-num">3</span></a>
                            </li>
                            <li class="filters-li">
                                <a class="filters-a" data-filter=".filter_photography"
                                   href="#" data-catid="25"
                                   data-pageid="123">Photography<span
                                        class="filter-num">1</span></a>
                            </li>
                        </ul>

                    </div><!--End filter-->

                    <div class="masonry-list masonry-grid grid-mask-filled-left">

                        <section class="grid-item grid-item-small filter_branding filter_illustration filter_works">

                            <div class="grid-item-inside">
                                <div class="grid-item-con">
                                    <a href="project-item-fullscreen-slider.html" title="Sofisticada"
                                       class="grid-item-mask-link grid-item-open-url"></a>

                                    <div class="grid-item-con-text">
                                                <span class="grid-item-cate">
                                                    <a href="#"
                                                       title="View all posts in Branding"
                                                       class="grid-item-cate-a"
                                                       data-filter=".filter_branding">Branding</a>
                                                    <a href="#" title="View all posts in Illustration"
                                                       class="grid-item-cate-a" data-filter=".filter_illustration">Illustration</a>
                                                </span>
                                        <h2 class="grid-item-tit">
                                            <a href="project-item-fullscreen-slider.html"
                                               title="Sofisticada"
                                               class="grid-item-tit-a">Sofisticada</a>
                                        </h2>
                                    </div>
                                </div>

                                <div class="brick-content ux-lazyload-wrap">
                                    <div class="ux-lazyload-bgimg ux-background-img"
                                         data-bg="https://via.placeholder.com/650x490"></div>
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

                                <div class="brick-content ux-lazyload-wrap">
                                    <div class="ux-lazyload-bgimg ux-background-img"
                                         data-bg="https://via.placeholder.com/650x490"></div>
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

                                <div class="brick-content ux-lazyload-wrap">
                                    <div class="ux-lazyload-bgimg ux-background-img"
                                         data-bg="https://via.placeholder.com/820x307"></div>
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

                                <div class="brick-content ux-lazyload-wrap">
                                    <div class="ux-lazyload-bgimg ux-background-img"
                                         data-bg="https://via.placeholder.com/820x307"></div>
                                </div>

                            </div><!--End inside-->

                        </section>

                        <section class="grid-item grid-item-small filter_branding filter_illustration filter_works"
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
                                         data-bg="https://via.placeholder.com/650x490"></div>
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
                                         data-bg="https://via.placeholder.com/650x490"></div>
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
                                         data-bg="https://via.placeholder.com/650x490"></div>
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
                                         data-bg="https://via.placeholder.com/650x490"></div>
                                </div>

                            </div><!--End inside-->

                        </section>

                        <section class="grid-item grid-item-small filter_illustration filter_uncategorized filter_works"
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
                                         data-bg="https://via.placeholder.com/650x490"></div>
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
                                         data-bg="https://via.placeholder.com/650x490"></div>
                                </div>

                            </div><!--End inside-->

                        </section>

                    </div><!--End masonry-list-->

                </div><!-- End container-masonry -->

            </div><!-- End #content_wrap-->

        </div><!-- End content_wrap_outer-->

    </div><!--End #content-->

@endsection
