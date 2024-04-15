
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Tên thương hiệu:') !!}
    <input type="text" class="form-control" name="name" value="{!! isset($brand) ? $brand->name: old('name') !!}">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('position', 'Vị trí:') !!}
    {!! Form::number('position', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12 bota_avatar_img">
    {!! Form::label('brand_img', 'Hình ảnh:') !!}
    <div class="fileinput clearfix {{ isset($brand->image) && !empty($brand->image) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="brand_img" value="" id="brand_img" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($brand->image) && !empty($brand->image))
        <img width="150px" src="{!! asset('uploads/brands/'. $brand->image) !!}" id="img-preview">
        @else
            <img width="150px" src="{{ asset('statics/imgs/no_image.gif') }}" id="img-preview">
        @endif
    </div>
    <div>
        <span class="btn default btn-file">
            <label class="select_photo" for="brand_img">
                Chọn ảnh 
            </label>
            <label class="change_photo" for="brand_img">
                Thay ảnh 
            </label>
        </span>
        <a href="#" class="btn default" id="removeImage" data-dismiss="fileinput">
        Xóa </a>
    </div>
    </div>
</div>
<div class="clearfix"></div>
{{-- <div class="form-group col-sm-6" style="float: revert">
    {!! Form::label('homepage_active', 'Homepage Active:') !!}
    {!! Form::select('homepage_active', ['1' => 'Enable','0' => 'Disable'], null, ['class' => 'form-control']) !!}

</div>

<div class="form-group col-sm-6" style="float: revert">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['1' => 'Enable','0' => 'Disable'], null, ['class' => 'form-control']) !!}
</div> --}}


<div class="form-group col-sm-12">
    {!! Form::label('description', 'Mô tả:') !!}
    <textarea class="form-control" id="ckeditor" name="description">@if(isset($brand->description)){{$brand->description}}@endif</textarea>
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('brands.index') }}" class="btn btn-default">Hủy</a>
</div>
@push('scripts')
    <script type="text/javascript">
		$(document).ready(function () {
			CKEDITOR.replace( 'ckeditor_short', {
                height: 300,
                filebrowserUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=file",
                filebrowserImageUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=image"
            } );
			CKEDITOR.replace( 'ckeditor', {
                height: 300,
                filebrowserUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=file",
                filebrowserImageUploadUrl: "{{ route('uploadAdmin')}}?_token={{ csrf_token()}}&type=image"
            } );
		});
        $(document).ready(function() {
            $('#brand_img').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('.fileinput-new').removeClass('fileinput-new').addClass('fileinput-exists');
            });
            $('#removeImage').click(function() {
                $('.fileinput-exists').removeClass('fileinput-exists').addClass('fileinput-new');
                $('#brand_img').val('');
                $('#img-preview').attr('src', '/statics/imgs/no_image.gif');
            });
        });
    </script>
@endpush
