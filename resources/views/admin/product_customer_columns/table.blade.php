<div class="table-responsive">
    <table class="table" id="productCustomerColumns-table">
        <thead>
            <tr>
                <th>Loại sản phẩm</th>
        <th>Cột Tên</th>
        <th>Cột code</th>
                <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($productCustomerColumns as $productCustomerColumn)
            <tr>
                <td>{{\App\Models\ProductCustomerColumn::$aryProductType[$productCustomerColumn->product_type]}}</td>
            <td>{{ $productCustomerColumn->cloumn_name }}</td>
            <td>{{ $productCustomerColumn->cloumn_code }}</td>
                <td>
                    {!! Form::open(['route' => ['productCustomerColumns.destroy', $productCustomerColumn->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productCustomerColumns.show', [$productCustomerColumn->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productCustomerColumns.edit', [$productCustomerColumn->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
