<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $tag->name }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $tag->slug }}</p>
</div>

<!-- Mô tả Field -->
<div class="form-group">
    {!! Form::label('description', 'Mô tả:') !!}
    <p>{{ $tag->description }}</p>
</div>

