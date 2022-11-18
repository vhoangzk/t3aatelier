@extends('web.layouts.master')

@section('body-class', 'error404 default-dark-logo pswp-light-skin responsive-ux navi-hide header-sticky Chrome107 dark-logo')

@section('content')

    <!-- Main Content : List, text content ... -->
    <div id="content">

        <div class="content_wrap_outer">

            <div id="content_wrap" class="fourofour-wrap">

                <div class="container-inn">
                    <h1>PAGE NOT FOUND</h1>
                    <h4>STAY CALM AND DON&#039;T FREAK OUT!</h4>
                    <p>Unfortunately, the page you are looking for is unavailable. Trying visit our <a href="{{route('web.home')}}">Homepage</a> and starting from there.</p>
                </div>

            </div><!-- End content_wrap-->

        </div><!-- End content_wrap_outer-->

    </div><!--End #content-->

@endsection
