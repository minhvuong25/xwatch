<div class="table-responsive">
    <table class="table" id="topProducts-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category Name</th>
            <th>Type</th>
            <th colspan="3">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topProductCategories as $topProductCategory)
            <tr>
                <td>{{ $topProductCategory->id }}</td>
                <td>@isset($topProductCategory->product->name) {{ $topProductCategory->product->name}} @endisset</td>
                <td>{{ $topProductCategory->category->name }}</td>
                <td>
                @if($topProductCategory->type == 2)
                    <label class="label btn-info">Top sản phẩm cột dọc</label>
                @endif
                @if($topProductCategory->type == 1)
                    <label class="label btn-success">Top sản phẩm cột ngang</label>
                @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['topProductCat.destroy', $topProductCategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('topProductCat.show', [$topProductCategory->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('topProductCat.edit', [$topProductCategory->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
