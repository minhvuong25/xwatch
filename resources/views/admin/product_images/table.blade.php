<div class="table-responsive">
    <table class="table" id="productImages-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Hình ảnh</th>
            <th class="text-center">Ngày đăng</th>
            <th class="text-center">Kiểu hiển thị</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($productImages as $productImage)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td class="text-center">
                    <img width="50px"
                         src="{{route("productImageShow", [
                    "id" => $productImage->product_id,
                    "fileName" => $productImage->name ?? "default.jpg"
                    ])}}">
                </td>
                <td class="text-center">{{ $productImage->created_at }}</td>
                <td class="text-center">{{ \App\Models\ProductImage::$imageType[$productImage->type] }}</td>
                <td class="text-center">
                    {!! Form::open(['route' => ['productImages.destroy', $productImage->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productImages.show', [$productImage->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('productImages.edit', [$productImage->id]) }}" class='btn btn-default btn-xs'><i
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
    {{ $productImages->links('vendor.pagination.bootstrap-4') }}
</div>
