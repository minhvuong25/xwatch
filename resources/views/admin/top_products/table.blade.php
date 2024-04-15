<div class="table-responsive">
    <table class="table" id="topProducts-table">
        <thead>
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Group</th>
            <th>Vùng miền</th>
            <th colspan="3">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topProducts as $topProduct)
            <tr>
                <td>{{ $topProduct->product_id }}</td>
                @if(isset($topProduct->product->name))
                <td>{{ $topProduct->product->name }}</td>
                @else
                <td>No name</td>
                @endif
                <td>{{ \App\Models\TopProduct::$aryTopProductCategoryName[$topProduct->group_id] }}</td>
                <td>{{ \App\Models\TopProduct::$aryTopProductLocationGroup[$topProduct->location_group] }}</td>
                <td>
                    {!! Form::open(['route' => ['topProducts.destroy', $topProduct->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('topProducts.show', [$topProduct->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('topProducts.edit', [$topProduct->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $topProducts->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
