@extends('_template_adm.master')

@php
    $pagetitle = ucwords(lang('project', $translation));
    if(isset($data)){
        $pagetitle .= ' ('.ucwords(lang('edit', $translation)).')';
        $link = route('admin.project.do_edit', $data->id);
    }else {
        $pagetitle .= ' ('.ucwords(lang('new', $translation)).')';
        $link = route('admin.project.do_create');
        $data = null;
    }
@endphp

@section('title', $pagetitle)

@section('content')
    <div class="">
        <!-- message info -->
        @include('_template_adm.message')

        <div class="page-title">
            <div class="title_left">
                <h3>{{ $pagetitle }}</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ ucwords(lang('form details', $translation)) }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left" action="{{ $link }}" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    @php
                                        $config = new stdClass();
                                        if(isset($data)) {
                                            echo set_input_form2('image', 'banner', ucwords(lang('banner', $translation)), $data, $errors, false, $config);
                                        } else {
                                            echo set_input_form2('image', 'banner', ucwords(lang('banner', $translation)), $data, $errors, true, $config);
                                        }
                                    @endphp
                                </div>
                                <div class="col-md-6">
                                    @php
                                        $config = new stdClass();
                                        echo set_input_form2('image', 'thumbnail', ucwords(lang('thumbnail', $translation)), $data, $errors, false, $config);
                                    @endphp
                                </div>
                            </div>
                            <div class="form-group vinput_meta_data">
                                @php
                                    // set_input_form2($type, $input_name, $label_name, $data, $errors, $required = false, $config = null)
                                    $listCategories = \App\Services\Admin\CategoryService::getList();
                                @endphp
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="category_id">{{ucwords(lang('categories', $translation))}}</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="category_id[]" id="category_id" class="form-control">
                                        @foreach($listCategories as $category)
                                            <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @php

                                $config = new stdClass();
                                $config->attributes = 'autocomplete="off"';
                                echo set_input_form2('text', 'name', ucwords(lang('name', $translation)), $data, $errors, true, $config);

                                $config = new stdClass();
                                $config->rows = 10;
                                echo set_input_form2('textarea', 'content', ucwords(lang('content', $translation)), $data, $errors, false, $config)
                            @endphp
                            <div class="form-group vinput_meta_data">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                       for="meta_data">{{ucwords(lang('meta data', $translation))}}</label>
                                <div class="col-md-6 col-sm-6 col-xs-12 meta-data-wrap">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @if(empty($data->meta_data))
                                        <div class="input-group meta-data-item" data-key="{{$i}}">
                                            <span class="input-group-addon">Name</span>
                                            <input type="text" class="form-control" data-attribute="name"
                                                   name="meta_data[{{$i}}][name]">
                                            <span class="input-group-addon">Value</span>
                                            <input type="text" class="form-control" data-attribute="value"
                                                   name="meta_data[{{$i}}][value]">
                                            <span class="input-group-btn">
                                            <button class="btn btn-default btn-add-meta-data" type="button"
                                                    style="margin-right: 0">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                            </span>
                                        </div>
                                    @else
                                        @foreach(json_decode($data->meta_data, true) as $item)
                                            <div class="input-group meta-data-item" data-key="{{$i}}">
                                                <span class="input-group-addon">Name</span>
                                                <input type="text" class="form-control" data-attribute="name"
                                                       value="{{array_key_first($item)}}"
                                                       name="meta_data[{{$i}}][name]">
                                                <span class="input-group-addon">Value</span>
                                                <input type="text" class="form-control" data-attribute="value"
                                                       value="{{$item[array_key_first($item)]}}"
                                                       name="meta_data[{{$i}}][value]">
                                                <span class="input-group-btn">
                                                <button class="btn btn-default btn-add-meta-data" type="button"
                                                        style="margin-right: 0">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                </span>
                                            </div>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            @php
                                $config = new stdClass();
                                $config->default = 'checked';
                                echo set_input_form2('switch', 'status', ucwords(lang('status', $translation)), $data, $errors, false, $config);
                            @endphp

                            <div class="ln_solid"></div>

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-save"></i>&nbsp;
                                        @if (isset($data))
                                            {{ ucwords(lang('save', $translation)) }}
                                        @else
                                            {{ ucwords(lang('submit', $translation)) }}
                                        @endif
                                    </button>
                                    <a href="{{ route('admin.project.list') }}" class="btn btn-danger">
                                        <i class="fa fa-times"></i>&nbsp;
                                        @if (isset($data))
                                            {{ ucwords(lang('close', $translation)) }}
                                        @else
                                            {{ ucwords(lang('cancel', $translation)) }}
                                        @endif
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Switchery -->
    @include('_form_element.switchery.css')
@endsection

@section('script')
    <!-- Switchery -->
    @include('_form_element.switchery.script')
    <script>
        $('#category_id').select2({
            multiple: true,
            allowClear: true,
            closeOnSelect: false
        });
        $('#category_id').val({!! json_encode($data->category_id) !!}).trigger('change');
        $(document).on('click', '.btn-add-meta-data', function () {
            let wrap = $(this).parents('.meta-data-wrap');
            let item = $(this).parents('.meta-data-item');
            let lastItem = $('.meta-data-item').last();
            let key = lastItem.data('key');
            key = parseInt(key);
            key++;
            let itemCopy = item.clone();
            itemCopy.data('key', key)
            let inputs = itemCopy.find('input');
            inputs.each(function () {
                $(this).attr('name', 'meta_data[' + key + '][' + $(this).data('attribute') + ']')
                $(this).val('');
            })
            wrap.append(itemCopy);
        });
    </script>
@endsection
