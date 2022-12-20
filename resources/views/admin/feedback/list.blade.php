@extends('_template_adm.master')

@php
    // USE LIBRARIES
    use App\Libraries\Helper;

    $this_object = ucwords(lang('feedback', $translation));

    if(isset($data)){
      $pagetitle = $this_object;
      $link_get_data = route('admin.feedback.get_data');
      $function_get_data = 'refresh_data();';
    }else{
      $pagetitle = ucwords(lang('deleted #item', $translation, ['#item' => $this_object]));
      $link_get_data = route('admin.feedback.get_data_deleted');
      $function_get_data = 'refresh_data_deleted();';
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
                        <h2>{{ ucwords(lang('data list', $translation)) }}</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table id="datatables" class="table table-striped table-bordered" style="display:none">
                                <thead>
                                <tr>
                                    <th>{{ ucwords(lang('name', $translation)) }}</th>
                                    <th>{{ ucwords(lang('email', $translation)) }}</th>
                                    <th>{{ ucwords(lang('content', $translation)) }}</th>
                                    <th>{{ ucwords(lang('created at', $translation)) }}</th>
                                </tr>
                                </thead>
                                <tbody id="sortable-data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <!-- Sortable-Table -->
    @include('_form_element.sortable_table.css')

    <!-- Select2 -->
    @include('_form_element.select2.css')
@endsection

@section('script')
    <script>

        $(document).ready(function () {
            {{ $function_get_data }}
        });

        function refresh_data() {
            $('#datatables').show();

            $.ajax({
                type: 'GET',
                url: '{{ $link_get_data }}',
                success: function (response) {
                    if (typeof response.status != 'undefined') {
                        if (response.status === 'true') {
                            var html = response.html;
                            $('#sortable-data').html(html);
                        } else {
                            alert(response.message);
                        }
                    } else {
                        alert('Server not respond, please refresh your page');
                    }
                },
                error: function (data, textStatus, errorThrown) {
                    console.log(data);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
    </script>
@endsection
