<div class="table-responsive">
    <table class="table" id="attributes-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Tên thuộc tính</th>
            <!-- <th>Tên</th> -->
            <th colspan="3" class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($attributes as $attribute)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>{{ $attribute->name }}</td>
                <td>
                                       {!! Form::open(['route' => ['attributes.destroy', $attribute->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <!-- <a href="{{ route('attributes.show', [$attribute->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a> -->
                        <a href="{{ route('attributes.edit', [$attribute->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
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
