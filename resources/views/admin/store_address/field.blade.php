
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('description', 'Mô tả:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('lng', 'Kinh độ:') !!}
    {!! Form::text('lng', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('lat', 'Vĩ độ:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('province', 'Province:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('province', 0) !!}
    </label>
    <select name="province" class="form-control">
        @foreach($province as $key => $value)
            <option
            @if(isset($storeAddress) && $storeAddress->province == $value->province_id) {{"selected"}}
                   value="{{$value->province_id}}">{{$value->name}}</option>
            @endif
                  value="{{$value->province_id}}">{{$value->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('storeAddresses.index') }}" class="btn btn-default">Hủy</a>
</div>
@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
            console.log(blah.src);
        });
    </script> --}}
@endpush
