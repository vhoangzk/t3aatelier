@php
    $this_object = ucwords(lang('category', $translation));
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
            <td>
                @if($item->status == \App\Models\Category::STATUS_ENABLE)
                    <span class="label label-success">{{ ucwords(lang("enabled", $translation)) }}</span>
                @else
                    <span class="label label-danger"><i>{{ ucwords(lang("disabled", $translation)) }}</i></span>
                @endif
            </td>
            <td>{{$item->created_at_edited}}</td>
            <td>{{$item->updated_at_edited}}</td>
            <td>
                <a href="{{ url("/".env("ADMIN_DIR")."/category/edit") }}/{{$item->id}}"
                   class="btn btn-xs btn-primary" title="{{ ucwords(lang("edit", $translation)) }}">
                    <i class="fa fa-pencil"></i>&nbsp; {{ ucwords(lang("edit", $translation)) }}
                </a>
                @if(empty($restore))
                    <form action="{{ route("admin.category.delete") }}" method="POST"
                          onsubmit="return confirm('{{ lang("Are you sure to delete this #item?", $translation, ["#item" => $this_object]) }}');"
                          style="display: inline">{{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn btn-xs btn-danger"
                                title="{{ ucwords(lang("delete", $translation)) }}">
                            <i class="fa fa-trash"></i>&nbsp; {{ ucwords(lang("delete", $translation)) }}
                        </button>
                    </form>
                @else
                    <form action="{{ route("admin.category.restore") }}" method="POST"
                          onsubmit="return confirm('{{ lang("Are you sure to restore this #item?", $translation, ["#item" => $this_object]) }}');"
                          style="display: inline">{{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn btn-xs btn-primary"
                                title="{{ ucwords(lang("restore", $translation)) }}">
                            <i class="fa fa-check"></i>&nbsp; {{ ucwords(lang("restore", $translation)) }}
                        </button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
@endif
