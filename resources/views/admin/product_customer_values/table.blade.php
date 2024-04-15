<div class="table-responsive">
    <table class="table" id="productCustomerValues-table">
        <thead>
            <tr>
                <th>Loại sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Mã cột sản phẩm</th>
                <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productCustomerValues as $productCustomerValue)
            <tr>
            <td>{{ $productCustomerValue->product_type}}</td>
            <td>{{ $productCustomerValue->cloumn_name }}</td>
            <td>{{ $productCustomerValue->cloumn_code }}</td>
                <td>
                    {!! Form::open(['route' => ['productCustomerValues.destroy', $productCustomerValue->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productCustomerValues.show', [$productCustomerValue->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productCustomerValues.edit', [$productCustomerValue->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
