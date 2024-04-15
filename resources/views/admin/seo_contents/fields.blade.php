<!-- Entity Id Field -->
<div class="form-group col-sm-6">
    <label for="Entity Id">Danh mục sản phẩm</label>
    <select name="entity_id" id="getEntity" class="form-control">
        @foreach ($category as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<!-- Entity Type Field -->
<div class="form-group col-sm-6 pull-left">
    {!! Form::label('entity_type', 'Trang hiển thị:') !!}
    <select name="entity_type" id="entity_type" class="form-control" onchange="getEntityData()">
        @foreach (\App\Models\SeoContent::$array_seo_type as $key => $val)
            <option @if (request()->get('entity_type') == $key) selected @endif value="{{ $key }}">{{ $val }}
            </option>
        @endforeach
    </select>

</div>


<!-- Meta Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('meta_title', 'Meta Title:') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control', 'maxlength' => 1000, 'maxlength' => 1000]) !!}
</div>

<!-- Meta Keyword Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('meta_keyword', 'Meta Keyword:') !!}
    {!! Form::textarea('meta_keyword', null, ['id' => 'meta_keyword','class' => 'form-control']) !!}
</div>

<!-- Meta Des Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('meta_des', 'Meta description:') !!}
    {!! Form::textarea('meta_des', null, ['id' => 'meta_des','class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('seoContents.index') }}" class="btn btn-default">Hủy</a>
</div>
<script type="text/javascript">
       CKEDITOR.replace("meta_keyword");
       CKEDITOR.replace("meta_des");
 </script>