@php
    $this_object = ucwords(lang('feedback', $translation));
@endphp
@if(empty($data))
    <tr>
        <td colspan="6"><h2 class="text-center">{{ strtoupper(lang("no data available", $translation)) }}</h2></td>
    </tr>
@else
    @foreach($data as $item)
        <tr role="row" id="row-{{$item->id}}" title="{{ ucfirst(lang("Drag & drop to sorting", $translation)) }}"
            data-toggle="tooltip">
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td style="max-width: 50%; width: 40%">{{$item->content}}</td>
            <td>{{$item->created_at_edited}}</td>
        </tr>
    @endforeach
@endif
