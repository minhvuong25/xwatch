
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Tên Video:') !!}
    <input type="text" class="form-control" name="name" value="{!! isset($videos) ? $videos->name: old('name') !!}">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Mô tả video:') !!}
    <input type="text" class="form-control" name="description" value="{!! isset($videos) ? $videos->description: old('description') !!}">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Alt Video:') !!}
    <input type="text" class="form-control" name="alt" value="{!! isset($videos) ? $videos->alt: old('alt') !!}">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Link video:') !!}
    <input type="text" class="form-control" name="link" value="{!! isset($videos) ? $videos->link: old('link') !!}">
</div>



{{-- <div class="form-group col-sm-12">
    {!! Form::label('image', 'Hình ảnh:') !!}
    <input type="file" multiple name="image" class="form-control">
</div> --}}

<div class="form-group col-sm-12 bota_avatar_img">
    {!! Form::label('image', 'Hình ảnh:') !!}
    <div class="fileinput clearfix {{ isset($videos->image) && !empty($videos->image) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="image" value="" id="image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($videos->image) && !empty($videos->image))
        <img width="150px" src="{!! asset('uploads/videoHome/'. $videos->image) !!}" id="img-preview">
        @else
            <img width="150px" src="{{ asset('statics/imgs/no_image.gif') }}" id="img-preview">
        @endif
    </div>
    <div>
        <span class="btn default btn-file">
            <label class="select_photo" for="image">
                Chọn ảnh 
            </label>
            <label class="change_photo" for="image">
                Thay ảnh 
            </label>
        </span>
        <a href="#" class="btn default" id="removeImage" data-dismiss="fileinput">
        Xóa </a>
    </div>
    </div>
</div>

{{-- @if (isset($videos->source_url) && !empty($videos->source_url))
<div>
    <label>kích hoạt</label>
    <div class="form-check">
        <input class="form-check-input" type="radio"
            {{ $videos->status == 0 ? ' checked ' : '' }}
        value="0" name="status">
        <label class="form-check-label">không</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio"
            {{ $videos->status == 1 ? ' checked ' : '' }}
        value="1" name="status">
        <label class="form-check-label">có</label>
    </div>
@endif --}}

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('videoHome.index') }}" class="btn btn-default">Hủy</a>
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
        <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('.fileinput-new').removeClass('fileinput-new').addClass('fileinput-exists');
            });
            $('#removeImage').click(function() {
                $('.fileinput-exists').removeClass('fileinput-exists').addClass('fileinput-new');
                $('#image').val('');
                $('#img-preview').attr('src', '/statics/imgs/no_image.gif');
            });
        });
    </script>
@endpush
