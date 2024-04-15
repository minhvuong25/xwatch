<div class="form-group col-sm-12 bota_avatar_img">
    {!! Form::label('source_url', 'Hình ảnh:') !!}
    <div class="fileinput clearfix {{ isset($logo->source_url) && !empty($logo->source_url) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="source_url" value="" id="source_url" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($logo->source_url) && !empty($logo->source_url))
        <img width="150px" src="{{ asset($logo->source_url) }}" id="img-preview">
        @else
            <img width="150px" src="{{ asset('statics/imgs/no_image.gif') }}" id="img-preview">
        @endif
    </div>
    <div>
        <span class="btn default btn-file">
            <label class="select_photo" for="source_url">
                Chọn ảnh 
            </label>
            <label class="change_photo" for="source_url">
                Thay ảnh 
            </label>
        </span>
        <a href="#" class="btn default" id="removeImage" data-dismiss="fileinput">
        Xóa </a>
    </div>
    </div>
</div>
@if (isset($logo->source_url) && !empty($logo->source_url))
<div class="form-group col-sm-12">
    <label>kích hoạt</label>
    <div class="form-check">
        <input class="form-check-input" type="radio"
            {{ $logo->status == 0 ? ' checked ' : '' }}
        value="0" name="status">
        <label class="form-check-label">không</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio"
            {{ $logo->status == 1 ? ' checked ' : '' }}
        value="1" name="status">
        <label class="form-check-label">có</label>
    </div>
</div>
@endif

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('logo.index') }}" class="btn btn-default">Hủy</a>
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
            $('#source_url').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('.fileinput-new').removeClass('fileinput-new').addClass('fileinput-exists');
            });
            $('#removeImage').click(function() {
                $('.fileinput-exists').removeClass('fileinput-exists').addClass('fileinput-new');
                $('#source_url').val('');
                $('#img-preview').attr('src', '/statics/imgs/no_image.gif');
            });
        });
    </script>
@endpush
