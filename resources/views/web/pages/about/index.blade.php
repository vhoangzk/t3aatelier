@extends('web.layouts.master')
@section('body-class', 'page page-template-default default-dark-logo pswp-light-skin responsive-ux navi-hide page_from_top dark-logo header-sticky preload')
@section('title', $data->title)
@section('og_title', $data->title)
@section('og_description')
    {!! $data->content !!}
@endsection
@section('og_image', asset($data->banner))
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

                                                <p class="promote-mod-a">Have a project for us? Get in
                                                    touch.</p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div><!--End fullwrap_moudle-->

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

                    <!--Fullwidth wrap-->
                    <div class="fullwrap_moudle">

                        <div class="row">

                            <div class="fullwidth-wrap fullwidth-text-white">

                                <div class="fullwidth-wrap-inn">

                                    <div class="row ">

                                        <div class="col-md-12 col-sm-12 moudle bottom-space-no" style="">

                                            <div class="module-map-canvas" data-add="Corlears Hook Park"
                                                 style="height: 400px;" data-l="21.25686807148103"
                                                 data-r="105.8410091055244" data-zoom="17" data-pin="t"
                                                 data-view="map" data-dismouse="f" data-pin-custom=""
                                                 data-style=""></div>

                                            <textarea class="form-control hidden module-map-style-code" rows="3">[{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#e9e9e9&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:17}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:29},{&quot;weight&quot;:0.2}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:18}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f5f5f5&quot;},{&quot;lightness&quot;:21}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#dedede&quot;},{&quot;lightness&quot;:21}]},{&quot;elementType&quot;:&quot;labels.text.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;color&quot;:&quot;#ffffff&quot;},{&quot;lightness&quot;:16}]},{&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:36},{&quot;color&quot;:&quot;#333333&quot;},{&quot;lightness&quot;:40}]},{&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;geometry&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;},{&quot;lightness&quot;:19}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:20}]},{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#fefefe&quot;},{&quot;lightness&quot;:17},{&quot;weight&quot;:1.2}]}]</textarea>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div><!--End fullwrap_moudle-->

                    <!--Normal Wrap-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-12 col-sm-12 moudle bottom-space-40">

                                <div class="separator  without-title blank-divider height-80"
                                     data-animationend="fadeined">

                                    <div class="separator_inn bg-" style="top: 8px;"></div>

                                </div>

                            </div>

                        </div>

                    </div><!--End container-fluid-->

                    <!--General Wrap-->
                    <div class="container-fluid" id="getInTouch">

                        <div class="row">

                            <div class="col-md-6 col-sm-6 general_moudle">

                                <div class="row">

                                    <!--Text Element-->
                                    <div class="col-md-6 col-sm-6 moudle bottom-space-20" style="">

                                        <div class="text_block ux-mod-nobg" data-animationend="fadeined">
                                            <p></p>
                                            <h5>CONTACT INFO</h5>
                                            <p></p>
                                            <p></p>

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <!--Text Element-->
                                    <div class="col-md-6 col-sm-6 moudle  bottom-space-no" style="">

                                        <div class="text_block ux-mod-nobg" data-animationend="fadeined">
                                            <p>Mong muốn mang đến cho khách hàng sự trải nghiệm về không gian kiến trúc chất lượng và khác biệt</p>
                                            <p><br></p>
                                            <h6>Email Us</h6>
                                            <p><a href="mailto:t3a.atelier@gmail.com" target="_blank">t3a.atelier@gmail.com</a></p>
                                            <p><br></p>
                                            <h6>Call Us</h6>
                                            <p><a href="tel:0988068164" target="_blank">0988.068.164</a></p>
                                            <p><br></p>
                                            <h6>Address Us</h6>
                                            <p>175 Đa Phúc, Tiên Dược, Sóc Sơn, Hà Nội</p>
                                        </div>
                                    </div>

                                </div>

                            </div><!--general_moudle-->

                            <!--General Wrap-->
                            <div class="col-md-6 col-sm-6 general_moudle">

                                <!--Text Element-->
                                <div class="row">

                                    <div class="col-md-6 col-sm-6 moudle  bottom-space-20" style="">

                                        <div class="text_block ux-mod-nobg  " data-animationend="fadeined">
                                            <p></p>
                                            <h5>GET IN TOUCH<br></h5>
                                            <p></p>
                                            <p></p>
                                        </div>

                                    </div>

                                    <!--Contact Form-->

                                    <div class="col-md-6 col-sm-6 moudle  bottom-space-no" style="">

                                        <div class="contactform ux-mod-nobg">

                                            <form action="{{route('admin.contact.sendEmailContact')}}" id="contact-form" class="contact_form"
                                                  method="POST">
                                                {{csrf_field()}}
                                                <p class="span6">
                                                    <input type="text" id="idi_name" name="idi_name"
                                                           class="requiredField" value="Name"
                                                           onBlur="if (this.value =='' ) {this.value = 'Name';}"
                                                           onFocus="if (this.value == 'Name' || this.value == 'Required' ) { this.value = ''; }"/>
                                                </p>
                                                <p class="span6">
                                                    <input type="text" id="idi_mail" name="idi_mail"
                                                           class="requiredField email" value="Email"
                                                           onBlur="if (this.value =='' ) {this.value = 'Email';}"
                                                           onFocus="if (this.value == 'Email' || this.value  == 'Required' || this.value == 'Invalid email' ) {this.value = '';}"/>
                                                </p>
                                                <p>
                                                    <textarea rows="4" name="idi_text" id="idi_text" cols="4"
                                                              class="requiredField inputError"
                                                              onfocus="if(this.value==this.defaultValue|| this.value  == 'Required'){this.value='';}"
                                                              onblur="if(this.value==''){this.value=this.defaultValue;}">YOUR MESSAGE</textarea>
                                                </p>
                                                <input type="hidden" class="info-tip" value="send"
                                                       name="contact_form" data-message="Done!"
                                                       data-sending="Sending"
                                                       data-error="Please Enter Correct Verification Number"/>
                                                <div class="btnarea"><input type="submit" id="idi_send"
                                                                            name="idi_send" value="SEND"/></div>
                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div><!--general_moudle-->

                        </div>

                    </div><!--End container-fluid-->

                </div><!-- End pagebuilder-wrap-->

            </div><!-- End content_wrap-->

        </div><!-- End content_wrap_outer-->

    </div><!--End #content-->
@endsection

@section('js')
    <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?v=3.exp&#038;key=AIzaSyBHdkRvl5n7NS2LONg9HJnMWAbXD6yq06k'></script>
@endsection
