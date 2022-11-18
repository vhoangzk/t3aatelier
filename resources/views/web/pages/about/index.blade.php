@extends('web.layouts.master')
@section('body-class', 'page page-template-default default-dark-logo pswp-light-skin responsive-ux navi-hide page_from_top dark-logo header-sticky preload')
@section('content')
    <!-- Main Content : List, text content ... -->
    <div id="content">

        <div class="content_wrap_outer">

            <div id="content_wrap">

                <div class="pagebuilder-wrap">

                    <!--Fullwidth wrap-->
                    <div class="fullwrap_moudle">

                        <div class="row">

                            <div class="fullwidth-wrap fullscreen-wrap">

                                <div data-type="background" class="parallax back-background" data-ratio="0.1">
                                    <img class="back-background-img" src="{{asset($data->banner)}}"
                                         alt="{{$data->title}}">

                                    <div class="back-background-img-mobile"
                                         style="background-image:url({{asset($data->banner)}})"></div>

                                </div>

                                <div class="container-fluid"></div>

                            </div>

                        </div>

                    </div><!--End fullwrap_moudle-->

                    <!--Spacer Element-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 moudle bottom-space-40">

                                <div class="separator  without-title blank-divider height-80" data-animationend="">

                                    <div class="separator_inn bg-" style="top: 8px;"></div>

                                </div>

                            </div>

                        </div>

                    </div><!--End container-fluid-->

                    <!--Text Element-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 moudle bottom-space-80" style="">

                                <div data-post="20160811-043526-466" class="text_block ux-mod-nobg  "
                                     data-animationend="fadeined">

                                    <h2>{{$data->title}}</h2>
                                    <p><br></p>
                                    <p>{!! $data->content !!}</p>

                                </div>

                            </div>

                        </div>

                    </div><!--End container-fluid-->

                    <!--Spacer Element-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 moudle  bottom-space-40">

                                <div class="separator  without-title  blank-divider height-20" data-animationend="">

                                    <div class="separator_inn bg-" style="top: 8px;"></div>

                                </div>

                            </div>

                        </div>

                    </div><!--End container-fluid-->

                    <!--Normal Wrap-->
                    <div class="container-fluid">

                        <div class="row">

                            @if(!empty($data->meta))
                                @foreach(json_decode($data->meta) as $meta)
                                    <div class="col-md-3 col-sm-3 moudle  bottom-space-40" style="">

                                        <section class="infrographic bignumber ux-mod-nobg">

                                            <div class="bignumber-item post-color-default" data-digit="{{$meta->value}}">0</div>

                                            <h2 class="infrographic-tit">{{$meta->name}}</h2>

                                        </section>

                                    </div>
                                @endforeach
                            @endif

                        </div>

                    </div><!--End container-fluid-->

                    <!--Normal Wrap-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 moudle  bottom-space-40" style="">

                                <div class="separator without-title blank-divider height-60" data-animationend="">

                                    <div class="separator_inn bg-" style="top: 8px;"></div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--Fullwidth wrap-->
                    <div class="fullwrap_moudle">

                        <div class="row">

                            <div class="fullwidth-wrap">

                                <div class="fullwidth-wrap-inn">

                                    <div class="row ">

                                        <div class="col-md-12 col-sm-12 moudle  bottom-space-no" style="">

                                            <div class="promote-mod bg-theme-color-1 promote-hover-bg-theme-color-9 "
                                                 data-animationend="" data-post="20160811-053914-197">

                                                <a href="#"><p class="promote-mod-a">Have a project for us? Get in
                                                        touch.</p></a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div><!--End fullwrap_moudle-->

                </div><!-- End pagebuilder-wrap-->

            </div><!-- End content_wrap-->

        </div><!-- End content_wrap_outer-->

    </div><!--End #content-->
@endsection
