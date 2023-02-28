@extends('web.layouts.master')

@section('content')

    <!-- Main Content : List, text content ... -->
    <div id="content" style="padding-top: 150px">

        <div class="content_wrap_outer fullwrap-layout">

            <div id="content_wrap" class="">

                <!--Portfolio Template-->
                <div
                    class="container-masonry ux-portfolio-spacing-40 ux-portfolio-3col container ux-has-filter filter-center"
                    data-col="3" data-spacer="20" data-template="intro-above" style="width: 1300px;">

                    <!--Filter-->
                    <div class="clearfix filters">

                        <ul class="filters-ul container">
                            <li class="filters-li active">
                                <a id="all" class="filters-a" href="javascript:;" data-filter="*">{{ ucwords(lang('all', $translation)) }}
                                    <span class="filter-num">11</span></a>
                            </li>
                            @foreach($categories as $category)
                                <li class="filters-li">
                                    <a class="filters-a" data-filter=".filter_category_{{$category->id}}" href="javascript:;"
                                       data-catid="{{$category->id}}">{{$category->name}}<span
                                            class="filter-num">{{$category->count_project}}</span></a>
                                </li>
                            @endforeach
                        </ul>

                    </div><!--End filter-->

                    <div class="masonry-list masonry-grid grid-mask-filled-left">

                        @foreach($projects as $key => $project)
                            @php
                                $classGrid = $classFilter = '';
                                    switch ($key) {
                                            case 2:
                                            $classGrid = 'grid-item-long';
                                            break;
                                            case 3:
                                            $classGrid = 'grid-item-tall';
                                            break;
                                            default:
                                                $classGrid = 'grid-item-small';
                                                break;
                                    }
                                    $classFilterArr = [];
                                    if ($project->categories->isNotEmpty()) {
                                        $project->categories->each(function ($item) use (&$classFilterArr) {
                                           $classFilterArr[] = " filter_category_$item->id";
                                        });
                                    }
                                    $classFilter = implode(' ', $classFilterArr);
                            @endphp
                            <section class="grid-item {{$classGrid}} {{$classFilter}} filter_works">

                                <div class="grid-item-inside">
                                    <div class="grid-item-con">
                                        <a href="{{route('web.project', ['path' => $project->path])}}" title="{{$project->name}}"
                                           class="grid-item-mask-link grid-item-open-url"></a>

                                        <div class="grid-item-con-text">
                                                <span class="grid-item-cate">
                                                    @if($project->categories->isNotEmpty())
                                                        @foreach($project->categories as $key => $category)
                                                            @if($key <= 4)
                                                                <a href="javascript:;"
                                                                   title="View all posts in {{$category->name}}"
                                                                   class="grid-item-cate-a"
                                                                   data-filter=".filter_category_{{$category->id}}">{{$category->name}}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </span>
                                            <h2 class="grid-item-tit">
                                                <a href="{{route('web.project', ['path' => $project->path])}}"
                                                   title="{{$project->name}}"
                                                   class="grid-item-tit-a">{{$project->name}}</a>
                                            </h2>
                                        </div>
                                    </div>

                                    <div class="brick-content ux-lazyload-wrap">
                                        <div class="ux-lazyload-bgimg ux-background-img"
                                             data-bg="{{asset($project->banner)}}"></div>
                                    </div>

                                </div><!--End inside-->

                            </section>
                        @endforeach

                    </div><!--End masonry-list-->

                </div><!-- End container-masonry -->

            </div><!-- End #content_wrap-->

        </div><!-- End content_wrap_outer-->

    </div><!--End #content-->

@endsection
