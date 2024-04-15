<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <p>{{ $category->parent_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $category->name }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    <p>{{ $category->slug }}</p>
</div>

<!-- Đường dẫn Cha Field -->
<div class="form-group">
    {!! Form::label('parent_path', 'Đường dẫn Cha:') !!}
    <p>{{ $category->parent_path }}</p>
</div>


<!-- Children Path Field -->
<div class="form-group">
    {!! Form::label('children_path', 'Children Path:') !!}
    <p>{{ $category->children_path }}</p>
</div>

<!-- Position Field -->
<div class="form-group">
    {!! Form::label('position', 'Position:') !!}
    <p>{{ $category->position }}</p>
</div>

<!-- Mô tả Field -->
<div class="form-group">
    {!! Form::label('description', 'Mô tả:') !!}
    <p>{{ $category->description }}</p>
</div>

