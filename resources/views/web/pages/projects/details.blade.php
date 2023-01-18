@extends('web.layouts.master')
@section('body-class', 'single single-post single-format-gallery default-dark-logo pswp-light-skin responsive-ux navi-hide dark-logo single-portfolio-fullwidth-slider header-sticky gallery-show-social-share-body preload')
@section('title', $project->name)
@section('og_title', $project->name)
@section('og_description')
    {!! $project->content !!}
@endsection
@section('og_image', asset($project->banner))
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
                                            <img alt="{{$project->name}}" src="{{asset($image->url)}}"
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
                                        <div
                                            class="gallery-info-property-item gallery-info-property-con">{{$item[array_key_first($item)]}}</div>
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
                                @if($prevProject)
                                    <div class="post-navi-unit post-navi-unit-prev col-sm-5 col-md-5 col-xs-5">
                                        <a href="{{route('web.project', ['path' => $prevProject->path])}}"
                                           title="{{$prevProject->name}}"
                                           class="arrow-item arrow-prev">
                                            <span class="navi-arrow"></span>
                                            <span class="navi-title-tag">PREV</span>
                                            <span class="navi-title-img">
                                            <img width="150" height="150"
                                                 src="{{asset($prevProject->banner)}}"
                                                 class="attachment-thumbnail size-thumbnail wp-post-image"
                                                 alt="{{$prevProject->name}} Image"
                                                 sizes="(max-width: 150px) 100vw, 150px"/>
                                        </span>
                                        </a>
                                    </div>
                                @endif

                                <div class="post-navi-go-back col-sm-2 col-md-2 col-xs-2">
                                    <a class="post-navi-go-back-a" href="{{route('web.home')}}" data-postid="61">
                                        <span class="post-navi-go-back-a-inn"></span>
                                    </a>
                                </div>

                                @if($nextProject)
                                    <div class="post-navi-unit post-navi-unit-next col-sm-5 col-md-5 col-xs-5">
                                        <a href="{{route('web.project', ['path' => $nextProject->path])}}"
                                           title="{{$nextProject->name}}"
                                           class="arrow-item arrow-next">
                                            <span class="navi-arrow"></span>
                                            <span class="navi-title-tag">NEXT</span><span class="navi-title-img">
                                            <img width="150" height="150"
                                                 src="{{asset($nextProject->banner)}}"
                                                 class="attachment-thumbnail size-thumbnail wp-post-image"
                                                 alt="{{$nextProject->name}} Image"
                                                 sizes="(max-width: 150px) 100vw, 150px"/>
                                        </span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </nav>
                    </div><!--End blog-unit-meta-bottom-->


                </article>

            </div><!-- End #content_wrap-->

        </div><!-- End content_wrap_outer-->


    </div><!--End #content-->
@endsection
