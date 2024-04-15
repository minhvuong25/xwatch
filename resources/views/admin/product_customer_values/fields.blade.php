<!-- Product Column Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_type', 'Product Column Type:') !!}
    {!! Form::number('product_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Column Value Field -->

<div class="form-group col-sm-6">
    {!! Form::label('cloumn_name', 'Product Column name Value:') !!}
    {!! Form::text('cloumn_name', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('cloumn_code', 'Product Column code Value:') !!}
    {!! Form::text('cloumn_code', null, ['class' => 'form-control','maxlength' => 500,'maxlength' => 500]) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productCustomerValues.index') }}" class="btn btn-default">Hủy</a>
</div>
