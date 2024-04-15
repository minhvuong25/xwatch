<!-- Name Field -->
<div class="form-group">
    {!! Form::label('title', 'title:') !!}
    <p>{{ $blog->title }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('content', 'content:') !!}
    <p>{{ $blog->content }}</p>
</div>

<!-- Path Field -->
<div class="form-group">
    {!! Form::label('description', 'description:') !!}
    <p>{{ $blog->description }}</p>
</div>


