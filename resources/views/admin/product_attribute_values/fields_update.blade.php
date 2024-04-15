<div class="form-group col-sm-6">
    <label>Mã sản phẩm</label>
    <input class="form-control" disabled value="{{$productAttributeValue->product_id}}">
</div>

<div class="form-group col-sm-6">
    <label>Thuộc tính</label>
    <input class="form-control" disabled value="{{$productAttributeValue->attributeValue->attribute->name}}">
</div>

<div class="form-group col-sm-6">
    <label>Giá trị</label>
    <input class="form-control" disabled value="{{$productAttributeValue->attributeValue->value}}">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('content', 'content :') !!}
    {!! Form::text('content', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productAttributeValues.index') }}" class="btn btn-default">Hủy</a>
</div>