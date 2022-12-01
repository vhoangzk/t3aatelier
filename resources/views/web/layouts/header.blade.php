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
                        <a class="logo-a" href="{{route('web.home')}}" title="Air Theme">
                            <h1 class="logo-h1 logo-not-show-txt">@yield('title', $global_config->og_title)</h1>
                            <img class="logo-image logo-dark" src="{{asset($global_config->app_logo_image)}}" alt="@yield('title', $global_config->og_title)"/>
                            <span class="logo-light">
                                <img class="logo-image" src="{{asset($global_config->app_logo_image)}}" alt="@yield('title', $global_config->og_title)"/>
                            </span>
                        </a>
                    </div>
                </div><!--End logo wrap-->

            </div>

        </div>

    </div><!--End header main-->

</header>
