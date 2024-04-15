<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('path', 'path:') !!}
    {!! Form::text('path', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Title Url -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url Link:') !!}
    {!! Form::text('url', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

{{-- <!-- Title description -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div> --}}


<!-- Slost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slost', 'Slost:') !!}
    {!! Form::number('slost', null, ['class' => 'form-control']) !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['1' => 'Yes', '0' => 'No'], null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', \App\Models\Banner::$aryBannerType, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::number('position', null, ['class' => 'form-control']) !!}
</div>
{{-- <div class="col-md-6">
    <div class="form-group">
        <label>Hiển thị:</label>
        {!! Form::select('is_mobile',array(''=>'Tất cả',\App\Models\Banner::BANNER_IS_WEBSITE => "Website",\App\Models\Banner::BANNER_IS_MOBILE_WEB => "Mobile"),Request::input('is_mobile'),array('class'=>'form-control')) !!}
    </div>
</div> --}}

<div class="form-group col-sm-12 bota_avatar_img">
    {!! Form::label('default_image', 'Ảnh đại diện:') !!}
    <div class="fileinput clearfix {{ isset($banner->name) && !empty($banner->name) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="default_image" value="" id="default_image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($banner->name) && !empty($banner->name))
        <img width="150px" src="{{ asset($banner->path) }}" id="img-preview">
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



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('banners.index') }}" class="btn btn-default">Hủy</a>
</div>

<script type="text/javascript">
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