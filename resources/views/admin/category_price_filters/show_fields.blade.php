<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Id:') !!}
    <p>{{ $categoryPriceFilters->category_id }}</p>
</div>

<!-- From Price Field -->
<div class="form-group">
    {!! Form::label('from_price', 'Giá từ:') !!}
    <p>{{ $categoryPriceFilters->from_price }}</p>
</div>

<!-- To Price Field -->
<div class="form-group">
    {!! Form::label('to_price', 'Đến Giá::') !!}
    <p>{{ $categoryPriceFilters->to_price }}</p>
</div>

