<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('group_id', 'Group:') !!}
    <select name="group_id" class="form-control">
        @foreach(\App\Models\TopProduct::$aryTopProductCategoryName as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    <select name="type" class="form-control">
        @foreach(\App\Models\TopProduct::$aryTopProductTypeName as $key => $val)
            <option value="{{$key}}">{{$val}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::number('position', 0, ['class' => 'form-control']) !!}
</div>

<div class="col-md-6">
    <div class="form-group">
        <label>Địa chỉ:</label>
        <select name="location_group" class="form-control">
            <option @if(isset($topProduct->location_group) && $topProduct->location_group == \App\Models\TopProduct::TOP_PRODUCT_LOCATION_GROUP_1) selected
                    @endif
                    value="{{\App\Models\TopProduct::TOP_PRODUCT_LOCATION_GROUP_1}}">Miền Băc
            </option>
            <option @if(isset($topProduct->location_group) && $topProduct->location_group == \App\Models\TopProduct::TOP_PRODUCT_LOCATION_GROUP_2) selected
                    @endif
                    value="{{\App\Models\TopProduct::TOP_PRODUCT_LOCATION_GROUP_2}}">Miền Trung
            </option>
            <option @if(isset($topProduct->location_group) && $topProduct->location_group == \App\Models\TopProduct::TOP_PRODUCT_LOCATION_GROUP_3) selected
                    @endif
                    value="{{\App\Models\TopProduct::TOP_PRODUCT_LOCATION_GROUP_3}}">Miền Nam
            </option>
        </select>
    </div>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('topProducts.index') }}" class="btn btn-default">Hủy</a>
</div>
