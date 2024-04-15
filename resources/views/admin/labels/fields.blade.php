<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('img', 'Image:') !!}
    <input type="file" id="avatar" name="img_label">
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('labels.index') }}" class="btn btn-default">Hủy</a>
</div>
