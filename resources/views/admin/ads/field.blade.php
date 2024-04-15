<div class="form-group col-sm-6">
    {!! Form::label('title', 'Tên :') !!}
    <input type="text" class="form-control" name="title" value="{!! isset($ads) ? $ads->title: old('title') !!}" required>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('link', 'Link :') !!}
    <input type="text" class="form-control" name="link" value="{!! isset($ads) ? $ads->link: old('link') !!}" required>
</div>

<div class="form-group col-sm-12">
    <div class="fileinput {{ isset($ads->image) && !empty($ads->image) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="image" value="" id="image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if(isset($ads->image) && !empty($ads->image))
            <img width="150px" src="{{ asset('uploads/imageHome/'.$ads->image) }}" id="img-preview">
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
    <label for="position">Vị trí</label>
    <select name="position" class="form-control">
        <option value="1">Trên</option>
        <option value="2">Dưới</option>
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="status">Trạng thái</label>
    <select name="status" class="form-control">
        <option value="1">Hiện</option>
        <option value="2">Ẩn</option>
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Mô tả sản phẩm:') !!}
    <textarea class="form-control" id="ckeditor" name="description" required>
        @if (isset($ads->description))
            {!! $ads->description ?? '' !!}
        @endif
    </textarea>
</div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('videoHome.index') }}" class="btn btn-default">Hủy</a>
</div>

{!! Form::close() !!}

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#adsForm').submit(function (e) {
                var title = $('input[name="title"]').val();
                var link = $('input[name="link"]').val();
                var image = $('input[name="image"]').val();
                var description = $('#ckeditor').val();

                if (title.trim() == '' || link.trim() == '' || image.trim() == '' || description.trim() == '') {
                    alert('Vui lòng điền đầy đủ thông tin.');
                    e.preventDefault();
                }
            });
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

            CKEDITOR.replace('ckeditor', {
                height: 100,
            });
        });
    </script>
@endpush
