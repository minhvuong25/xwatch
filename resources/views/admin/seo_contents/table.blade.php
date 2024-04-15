<div class="table-responsive">
    <table class="table" id="seoContens-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Trang hiển thị</th>
                <th>Tiêu đề Meta</th>
                <th>Từ khóa Meta</th>
                <th>Meta description</th>
                <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($seoContens as $seoContent)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>{{ \App\Models\SeoContent::$array_seo_type[$seoContent->entity_type] }}</td>
                <td>{{ $seoContent->meta_title }}</td>
                <td>{{ $seoContent->meta_keyword }}</td>
                <td>{{ $seoContent->meta_des }}</td>
                <td>
                    {!! Form::open(['route' => ['seoContents.destroy', $seoContent->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('seoContents.show', [$seoContent->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('seoContents.edit', [$seoContent->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @php
            $index++; 
        @endphp
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $seoContens->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>

</div>
