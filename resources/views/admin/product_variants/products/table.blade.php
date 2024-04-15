<div class="table">
    <table class="table" id="products-table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Ma sp</th>
            <th>Images</th>
            <th>Price</th>
            <th>Giá gốc</th>
            <th>Category</th>
            <th>Brand</th>
            <th>Size Phụ kiện</th>
            <th>Trạng Thái</th>
            {{-- <th>Notify Sale</th> --}}
            <th colspan="3">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                {{-- <td>{{ $product->product_id }}</td> --}}
                <td>
                    {{ $product->name }}
                    {{-- <a href="{{route("product.detail", ["slug" => $product->slug])}}" target="_blank">
                        Link
                    </a> --}}
                </td>
                <td>{{ $product->sku }}</td>
                <td>
                    @if ($product->images->first() === null)
                        <img src="" alt="donghothinhvuong.bota.vn">
                    @else
                        <img width="50px"
                        src="{{route("productImageShow", [
                            "id" => $product->id,
                            "fileName" => $product->images->first()->name ?? "default.jpg"
                            ])}}">
                    @endif
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->compare_price}}</td>
                <td>{{$product->category->name ?? ''}}</td>
                <td>{{ $product->brand->name ?? '' }}</td>
                <td>{{ $product->size ?? '' }}</td>
                {{-- <td @if($product->variants->count() == 0) style="color: red;"@endif>
                    {{ $product->variants->count() }} variants
                </td> --}}
                <td>{{\App\Models\Product::$status[$product->status]}}</td>
                {{-- <td>
                    <a class='btn btn-success btn-xs' href="{{ route('notify_sale_product',['id'=>$product->id]) }}">
                        notify sale
                    </a>
                </td> --}}
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('products.edit', [$product->id]) }}"
                           class='btn btn-default btn-xs'><i
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
        {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
