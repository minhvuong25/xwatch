
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Tên chính sách:') !!}
    <input type="text" class="form-control" name="title" value="{!! isset($policy) ? $policy->title: old('title') !!}">
</div>
<div class="form-group col-sm-12 bota_avatar_img">
    {!! Form::label('image', 'Hình ảnh:') !!}
    <div class="fileinput clearfix {{ isset($policy->image) && !empty($policy->image) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="image" value="" id="image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($policy->image) && !empty($policy->image))
        <img width="150px" src="{!! asset('uploads/policy/'. $policy->image) !!}" id="img-preview">
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
<div class="form-group col-sm-6">
    {!! Form::label('url', 'URL liên kết:') !!}
    <input type="text" class="form-control" name="url" value="{!! isset($policy) ? $policy->url: old('url') !!}">
</div>
<div class="form-group col-sm-12">
    {!! Form::label('show_on_homepage', 'Hiển thị trên trang chủ:') !!}
    <input type="hidden" name="show_on_homepage" value="0">
    <input type="checkbox" name="show_on_homepage" value="1" {!! isset($policy) && $policy->show_on_homepage ? 'checked' : '' !!}>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('videoHome.index') }}" class="btn btn-default">Hủy</a>
</div>
@push('scripts')
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
