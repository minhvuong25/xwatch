<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <select class="form-control" name="parent_id">
        <option value="0">Root</option>
        @foreach($categories as $val)
            <option @if(isset($category->parent_id) && $category->parent_id == $val["id"]){{"selected"}}@endif value="{{$val["id"]}}">
                @if($val["level"] == 1){{"----"}}@endif
                @if($val["level"] == 2){{"------"}}@endif
                {{$val["name"]}}
            </option>
        @endforeach
    </select>
</div>



<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 250,'maxlength' => 250]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Lên trang chủ') !!}
    <input type="checkbox"
           name="is_home" @if (isset($category) && $category->is_home == 1) checked @endif
           value="1">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Vị trí trung tâm') !!}
    <input type="checkbox"
           name="is_special" @if (isset($category) && $category->is_special == 1) checked @endif
           value="1">
</div>

<div class="form-group col-sm-12 bota_avatar_img">
    {!! Form::label('image', 'Hình ảnh:') !!}
    <div class="fileinput clearfix {{ isset($category->image) && !empty($category->image) ? 'fileinput-exists' : 'fileinput-new' }}" data-provides="fileinput">
    <input type="file" name="image" value="" id="image" style="display: none;">
    <div class="fileinput-thumbnail thumbnail" style="width: 200px; height: 150px;">
        <img src="/statics/imgs/no_image.gif" alt="Avatar">
    </div>
    <div class="fileinput-preview thumbnail" style="width: 200px; height: 150px; line-height: 150px;">
        @if (isset($category->image) && !empty($category->image))

        <img width="150px" src="{!! asset($category->image) !!}" id="img-preview">
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

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Mô tả:') !!}
    <textarea class="form-control" id="ckeditor"
              name="description">@if(isset($category->description)){{$category->description}}@endif</textarea>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('status', 'Trạng thái:') !!}
    {!! Form::select('status', [\App\Models\Category::CATEGORY_STATUS_IS_ACTIVE => 'Active', \App\Models\Category::CATEGORY_STATUS_IS_NOT_ACTIVE => 'Deactivate'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">Hủy</a>
</div>

@push('scripts')
    <script type="text/javascript">
       CKEDITOR.replace("ckeditor");
    </script>
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
