<div class="table-responsive">
    <table class="table" id="brands-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Tên</th>
            <th>Seo URL</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($data as $brand)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>{{ $brand->title }}</td>
                <td>{{ $brand->slug }}</td>
                <td class="text-center">
                    {!! Form::open(['route' => ['productManual.destroy', $brand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        <div class='btn-group'>
                            <a href="{{ route('productManual.edit', [$brand->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        </div>

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
        {{ $data->links() }}
    </div>
</div>
