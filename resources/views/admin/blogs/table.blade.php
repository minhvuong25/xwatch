<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Ảnh đại diện</th>
            <th>Tiêu đề</th>
            <th>Thời gian đăng bài</th>
            <th>Thời gian sửa bài</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($blogs as $blog)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td class="text-center"><img width="150px" src="{!! asset($blog->default_image) !!}" id="img-preview"></td>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->created_at->format('d/m/Y H:i:s') }}</td>
                <td>{{ $blog->updated_at->format('d/m/Y H:i:s') }}</td>
                <td>
                    {!! Form::open(['route' => ['blog.destroy', $blog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ url('tin-tuc/' . $blog->slug . '.html') }}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{{ route('blog.edit', [$blog->id]) }}" class='btn btn-default btn-xs'>
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        
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
</div>
