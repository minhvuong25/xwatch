<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <select class="form-control" name="category_blog_id">
        <option value="0">Root</option>
        @if (!empty($categoryBlogData))
            @foreach ($categoryBlogData as $val)
                <option @if (isset($categoryBlogData->parent_id) && $categoryBlogData->parent_id == $val['id']) {{ 'selected' }} @endif value="{{ $val['id'] }}">
                    @if ($val['level'] == 1)
                        {{ '----' }}
                    @endif
                    @if ($val['level'] == 2)
                        {{ '------' }}
                    @endif
                    {{ $val['title'] }}
                </option>
            @endforeach
        @endif
    </select>
</div>
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Tiêu đề') !!}
    <input type="text" class="form-control" name="title" value="{!! isset($blogData) ? $blogData->title : old('title') !!}">
</div>
<div class="form-group col-sm-12 bota_avatar_img">
    {!! Form::label('default_image', 'Hình ảnh:') !!}
    <div class="fileinput clearfix {{ isset($blogData->default_image) && !empty($blogData->default_image) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="default_image" value="" id="default_image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
    @if (isset($blogData->default_image) && !empty($blogData->default_image))
        <img width="150px" src="{!! asset($blogData->default_image) !!}" id="img-preview">
        @else
            <img width="150px" src="{{ asset('statics/imgs/no_image.gif') }}" id="img-preview">
        @endif
    </div>
    <div>
        <span class="btn default btn-file">
            <label class="select_photo" for="default_image">
                Chọn ảnh 
            </label>
            <label class="change_photo" for="default_image">
                Thay ảnh 
            </label>
        </span>
        <a href="#" class="btn default" id="removeImage" data-dismiss="fileinput">
        Xóa </a>
    </div>
    </div>
</div>
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Mô tả ngắn') !!}
    <textarea class="form-control" id="ckeditor_short" name="description">
    @if (isset($blogData->description))
    {{ $blogData->description }}
    @endif
</textarea>

</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Nội dung') !!}
    <textarea class="form-control" id="ckeditor_content" name="content">
    @if (isset($blogData->content))
    {{ $blogData->content }}
    @endif
</textarea>

</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('blog.index') }}" class="btn btn-default">Hủy</a>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('ckeditor_short');
            CKEDITOR.replace('ckeditor_content');
        });
        $(document).ready(function() {
            $('#default_image').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('.fileinput-new').removeClass('fileinput-new').addClass('fileinput-exists');
            });
            $('#removeImage').click(function() {
                $('.fileinput-exists').removeClass('fileinput-exists').addClass('fileinput-new');
                $('#default_image').val('');
                $('#img-preview').attr('src', '/statics/imgs/no_image.gif');
            });
        });
    </script>
@endpush
