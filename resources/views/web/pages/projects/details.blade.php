@extends('web.layouts.master')

@section('content')
    <!-- Main Content : List, text content ... -->
    <div id="content">

        <div class="content_wrap_outer fullwrap-layout">

            <div id="content_wrap" class="">

                <article
                    class="post type-post status-publish format-gallery has-post-thumbnail hentry category-branding category-featured category-illustration category-works post_format-post-format-gallery">

                    <div class="blog-unit-gallery-wrap single-fullwidth-slider-wrap">

                        <!--Slider wrap-->
                        <div class="owl-carousel" data-item="3" data-center="true" data-margin="30"
                             data-autowidth="true" data-slideby="1" data-showdot="false" data-nav="true"
                             data-loop="true">

                            @if($project->images->isNotEmpty())
                                @foreach($project->images as $image)
                                    <section class="item">
                                        <div class="carousel-img-wrap">
                                            <img alt="{{$project->name}}" src="{{$image->url}}"
                                                 class="single-fullwidth-slider-carousel-img">
                                        </div>
                                    </section>
                                @endforeach
                            @else
                                <section class="item">
                                    <div class="carousel-img-wrap">
                                        <img alt="red-room-001" src="https://via.placehold.it/1000x625"
                                             class="single-fullwidth-slider-carousel-img">
                                    </div>
                                </section>
                            @endif

                        </div><!--End owl-carousel-->

                    </div><!--End blog-unit-gallery-wrap-->

                    <div class="title-wrap container">
                        <div class="title-wrap-con">
                            <h1 class="title-wrap-tit">{{$project->name}}</h1>
                        </div>
                    </div>

                    <div class="container gallery-post-des">

                        <div class="entry">
                            {!! $project->content !!}
                        </div><!--End entry-->

                        <div class="social-bar">

                            <ul class="post_social post-meta-social">

                                <li class="post-meta-social-li">
                                    <a class="share postshareicon-facebook-wrap"
                                       href="http://www.facebook.com/sharer.php?u=http://themes.uiueux.com/air/red-room/"
                                       onclick="window.open('http://www.facebook.com/sharer.php?u=http://themes.uiueux.com/air/red-room/','Facebook','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;">
                                        <span class="fa fa-facebook postshareicon-facebook"></span>
                                    </a>
                                </li>


                                <li class="post-meta-social-li">
                                    <a class="share postshareicon-twitter-wrap"
                                       href="http://twitter.com/share?url=http://themes.uiueux.com/air/red-room/&amp;text=Red Room"
                                       onclick="window.open('http://twitter.com/share?url=http://themes.uiueux.com/air/red-room/&amp;text=Red Room','Twitter share','width=600,height=300,left='+(screen.availWidth/2-300)+',top='+(screen.availHeight/2-150)+''); return false;">
                                        <span class="fa fa-twitter postshareicon-twitter"></span>
                                    </a>
                                </li>


                                <li class="post-meta-social-li">
                                    <a class="share postshareicon-googleplus-wrap"
                                       href="https://plus.google.com/share?url=http://themes.uiueux.com/air/red-room/"
                                       onclick="window.open('https://plus.google.com/share?url=http://themes.uiueux.com/air/red-room/','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        <span class="fa fa-google-plus postshareicon-googleplus"></span>
                                    </a>
                                </li>


                                <li class="post-meta-social-li">
                                    <a class="share postshareicon-pinterest-wrap" href="javascript:;"
                                       onclick="javascript:window.open('http://pinterest.com/pin/create/bookmarklet/?url=http://themes.uiueux.com/air/red-room/&amp;is_video=false&amp;media=http://themes.uiueux.com/air/wp-content/uploads/sites/3/2016/06/Red-Room-010.jpg','', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                                        <span class="fa fa-pinterest  postshareicon-pinterest"></span>
                                    </a>
                                </li>

                            </ul>

                        </div><!--End social-bar-->

                    </div><!--End gallery-post-des-->

                    <div class="container gallery-property">

                        <ul class="gallery-info-property row">
                            @if(!empty($project->meta_data))
                                @php
                                    $meta = json_decode($project->meta_data, true);
                                @endphp
                                @foreach($meta as $item)
                                    <li class="gallery-info-property-li col-md-3 col-sm-3">
                                        <h3 class="gallery-info-property-item gallery-info-property-tit">{{ucwords(lang(strtolower(array_key_first($item)), $translation))}}</h3>
                                        <div class="gallery-info-property-item gallery-info-property-con">{{$item[array_key_first($item)]}}</div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>

                    </div><!--End gallery-property -->

                    @if(!empty($project->external_url))
                        <div class="gallery-link container">
                            <p><a href="{!! $project->external_url !!}" title="Website"
                                  class="gallery-link-a" target="_blank">Website</a></p>
                        </div>
                @endif

                <!--Post navi-->
                    <div class="blog-unit-meta-bottom">
                        <nav class="post-navi-single row">
                            <div class="container">
                                <div class="post-navi-unit post-navi-unit-prev col-sm-5 col-md-5 col-xs-5">
                                    <a href="project-item-standard-grid.html" title="Look Addict"
                                       class="arrow-item arrow-prev"><span class="navi-arrow"></span><span
                                            class="navi-title-tag">PREV</span><span class="navi-title-img"><img
                                                width="150" height="150"
                                                src="https://via.placeholder.com/150x150"
                                                class="attachment-thumbnail size-thumbnail wp-post-image"
                                                alt="Thumbnail Image"
                                                srcset="https://via.placeholder.com/150x150 150w, https://via.placeholder.com/200x200 400w, https://via.placeholder.com/300x300 650w"
                                                sizes="(max-width: 150px) 100vw, 150px"/></span></a>
                                </div>

                                <div class="post-navi-go-back col-sm-2 col-md-2 col-xs-2">
                                    <a class="post-navi-go-back-a" href="index.html" data-postid="61"><span
                                            class="post-navi-go-back-a-inn"></span></a>
                                </div>

                                <div class="post-navi-unit post-navi-unit-next col-sm-5 col-md-5 col-xs-5">
                                    <a href="project-item-fullscreen-slider.html" title="Sofisticada"
                                       class="arrow-item arrow-next"><span class="navi-arrow"></span><span
                                            class="navi-title-tag">NEXT</span><span class="navi-title-img"><img
                                                width="150" height="150"
                                                src="https://via.placeholder.com/150x150"
                                                class="attachment-thumbnail size-thumbnail wp-post-image"
                                                alt="Thumbnail Image"
                                                srcset="https://via.placeholder.com/150x150 150w, https://via.placeholder.com/200x200 400w, https://via.placeholder.com/300x300 650w"
                                                sizes="(max-width: 150px) 100vw, 150px"/></span></a>
                                </div>
                            </div>
                        </nav>
                    </div><!--End blog-unit-meta-bottom-->


                </article>

            </div><!-- End #content_wrap-->

        </div><!-- End content_wrap_outer-->


    </div><!--End #content-->
@endsection
