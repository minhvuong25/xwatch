<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    <input type="number" class="form-control" name="product_id" value="<?php if(isset($topProductCategory)) echo $topProductCategory->product_id?>">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    <select class="form-control" name="category_id">
        @foreach($categories as $val)
            <option @if(isset($topProductCategory->category_id) && $topProductCategory->category_id == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                @if($val["level"] == 1){{"----"}}@endif
                @if($val["level"] == 2){{"------"}}@endif
                {{$val["name"]}}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', ['1' => 'Top sản phẩm ngang','2' => 'Top sản phẩm dọc'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('topProductCat.index') }}" class="btn btn-default">Hủy</a>
</div>
