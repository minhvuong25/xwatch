<!-- Sku Field -->
<div class="form-group">
    {!! Form::label('sku', 'Sku:') !!}
    <p>{{ $product->sku }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $product->slug }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Giá:') !!}
    <p>{{ $product->price }}</p>
</div>

<!-- Compare Price Field -->
<div class="form-group">
    {!! Form::label('compare_price', 'Compare Giá:') !!}
    <p>{{ $product->compare_price }}</p>
</div>

<!-- Product Type Field -->
<div class="form-group">
    {!! Form::label('product_type', 'Product Type:') !!}
    <p>{{ $product->product_type }}</p>
</div>

{{-- <!-- Vendor Id Field -->
<div class="form-group">
    {!! Form::label('vendor_id', 'Vendor Id:') !!}
    <p>{{ $product->vendor_id }}</p>
</div> --}}

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $product->status }}</p>
</div>

<!-- Mô tả Field -->
<div class="form-group">
    {!! Form::label('description', 'Mô tả:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Default Img Field -->
<div class="form-group">
    {!! Form::label('default_img', 'Default Img:') !!}
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
</div>

