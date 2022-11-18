<div id="menu-panel">

    <div class="menu-panel-inn fullscreen-wrap">

        <nav id="navi">

            <div id="navi-wrap" class="menu-navi-wrap">

                <ul class="menu clearfix">
                    <li class="menu-item current-menu-item current_page_item menu-item-has-children hidden">
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
                    <li id="menu-item-246" class="menu-item"><a href="{{route('web.home')}}">{{ucwords(lang('home', $translation))}}</a></li>
                    <li id="menu-item-256" class="menu-item"><a href="{{route('web.about')}}">{{ucwords(lang('about', $translation))}}</a></li>
                    <li id="menu-item-247" class="menu-item"><a href="{{route('web.contact')}}">{{ucwords(lang('contact', $translation))}}</a></li>
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
