<footer id="footer" class="footer-cols-layout">

    <div class="footer-info">
        <div class="footer-container">
            <div class="span6">
                <div id="logo-footer">
                    <a href="{{route('web.home')}}" title="@yield('title', $global_config->og_title)">
                        <img class="logo-footer-img" src="{{asset($global_config->app_logo_image)}}"
                             alt="@yield('title', $global_config->og_title)"/>
                    </a>
                </div>
            </div>

            <div class="span6">
                <div class="footer-social">
                    <ul class="socialmeida clearfix">

                        @if($global_config->facebook_linked)
                            <li class="socialmeida-li">
                                <a title="Facebook" href="{{$global_config->facebook_linked}}"
                                   class="socialmeida-a">
                                    <span class=""></span> <span class="socialmeida-text">Facebook</span>
                                </a>
                            </li>
                        @endif

                        @if($global_config->twitter_linked)
                            <li class="socialmeida-li">
                                <a title="Twitter" href="{{$global_config->twitter_linked}}" class="socialmeida-a">
                                    <span class=""></span> <span class="socialmeida-text">Twitter</span>
                                </a>
                            </li>
                        @endif

                        @if($global_config->youtube_linked)
                            <li class="socialmeida-li">
                                <a title="Behance" href="{{$global_config->youtube_linked}}" class="socialmeida-a">
                                    <span class=""></span> <span class="socialmeida-text">Youtube</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid back-top-wrap">
        <div id="back-top"></div>
    </div>

</footer>
