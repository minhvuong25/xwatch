
<div class="form-group col-sm-6">
    {!! Form::label('customer_name', 'Tên :') !!}
    <input type="text" class="form-control" name="customer_name" value="{!! isset($customerSays) ? $customerSays->customer_name : old('customer_name') !!}">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('link_video', 'Link Video:') !!}
    <input type="text" class="form-control" name="link_video" value="{!! isset($customerSays) ? $customerSays->link_video : old('link_video') !!}">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('link_name', 'Link Name:') !!}
    <input type="text" class="form-control" name="link_name" value="{!! isset($customerSays) ? $customerSays->link_name : old('link_name') !!}">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Mô tả:') !!}
    <input type="text" class="form-control" name="description" value="{!! isset($customerSays) ? $customerSays->description : old('link_name') !!}">
</div>

<div class="form-group col-sm-12">
    <label for="">Hiện lên trang chủ</label>
    <select name="status" class="form-control">
        <option value="1">Hiện</option>
        <option value="2">Ẩn</option>
    </select>
</div>

<div class="form-group col-sm-6 bota_avatar_img">
    {!! Form::label('default_image', 'Hình ảnh:') !!}
    <div class="fileinput clearfix {{ isset($customerSays->default_image) && !empty($customerSays->default_image) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="default_image" value="" id="default_image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($customerSays->default_image) && !empty($customerSays->default_image))
        <img width="150px" src="{!! asset('uploads/customer/'. $customerSays->default_image) !!}" id="img-preview">
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

<div class="form-group col-sm-6 bota_avatar_img">
    {!! Form::label('video_image', 'Hình ảnh Video:') !!}
    <div class="fileinput clearfix {{ isset($customerSays->video_image) && !empty($customerSays->video_image) ? 'fileinput-existss' : 'fileinput-news' }}" data-provides="fileinput">
    <input type="file" name="video_image" value="" id="video_image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($customerSays->video_image) && !empty($customerSays->video_image))
        <img width="150px" src="{!! asset('uploads/customer/' . $customerSays->video_image) !!}" id="img-video">
        @else
            <img width="150px" src="{{ asset('statics/imgs/no_image.gif') }}" id="img-video">
        @endif
    </div>
    <div>
        <span class="btn default btn-file">
            <label class="select_photo" for="video_image">
                Chọn ảnh 
            </label>
            <label class="change_photo" for="video_image">
                Thay ảnh 
            </label>
        </span>
        <a href="#" class="btn default" id="removeImage-video" data-dismiss="fileinput">
        Xóa </a>
    </div>
    </div>
</div>
<!-- Comment Field -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('customerSays.index') }}" class="btn btn-default">Hủy</a>
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
            $('#video_image').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-video').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('.fileinput-news').removeClass('fileinput-news').addClass('fileinput-existss');
            });
            $('#removeImage-video').click(function() {
                $('.fileinput-existss').removeClass('fileinput-existss').addClass('fileinput-news');
                $('#video_image').val('');
                $('#img-video').attr('src', '/statics/imgs/no_image.gif');
            });
        });
    </script>