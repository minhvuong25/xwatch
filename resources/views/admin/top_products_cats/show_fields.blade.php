<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product:') !!}
    <p>{{ $topProductCategory->product->name }}</p>
</div>

<div class="form-group">
    {!! Form::label('product_id', 'Category:') !!}
    <p>{{ $topProductCategory->category->name }}</p>
</div>