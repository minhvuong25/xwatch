<div class="table-responsive">
    <table class="table" id="tags-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Slug</th>
        <th>Mô tả</th>
        <th>Tag Group</th>
        <th>Img chứng chỉ</th>
        <th>Thứ tự</th>
        <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)

            <tr>
                <td>{{ $tag->name ?? '' }}</td>
            <td>{{ $tag->slug ?? ''}}</td>

            <td>{{ $tag->description ?? ''}}</td>
            <td>{{ $tag->tagGroup->name ?? '' }}</td>
            <td>
                @if(!empty($tag->tag_img))
                    <img alt="donghothinhvuong.bota.vn" style="width:100% !important;" src="{{route("showImage",
                                                                       [
                                                                       "entity" => "tag_img",
                                                                       "id" =>$tag->id,
                                                                       "size" =>0,
                                                                       "fileName" => $tag->tag_img
                                                                       ])}}">
                @endif
            </td>
                <td>{{ $tag->position }}</td>
                <td>
                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tags.show', [$tag->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('tags.edit', [$tag->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $tags->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
