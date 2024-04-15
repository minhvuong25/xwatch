<div class="table-responsive">
    <table class="table" id="attributeValues-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Attribute Name</th>
            <th>Giá trị</th>
            <th>Code</th>
            <th colspan="3">Hành Động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($attributeValues as $attributeValue)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>{{ $attributeValue->attribute->name }}</td>
                <td>{{ $attributeValue->value }}</td>
                <td>{{ $attributeValue->code }}</td>
                <td>
                    {!! Form::open(['route' => ['attributeValues.destroy', $attributeValue->id], 'method' => 'delete']) !!}

                    <div class='btn-group'>
                        <a href="{{ route('attributeValues.show', [$attributeValue->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('attributeValues.edit', [$attributeValue->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>

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
        {{ $attributeValues->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
