<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Id:') !!}
    <select class="form-control" name="category_id">
        @foreach ($categories as $val)
            <option @if (isset($product->category_id) && $product->category_id == $val['id']) {{ 'selected' }} @endif value="{{ $val['id'] }}">
                @if ($val['level'] == 1)
                    {{ '----' }}
                @endif
                @if ($val['level'] == 2)
                    {{ '------' }}
                @endif
                {{ $val['name'] }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('sku', 'Sku:') !!}
    {!! Form::text('sku', null, ['class' => 'form-control', 'maxlength' => 30, 'maxlength' => 30]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('price', 'Giá:') !!}
    <input class="form-control" name="price" type="number" onkeyup="onlyNumberAmount(this)">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('compare_price', 'Giá gốc:') !!}
    <input class="form-control" name="compare_price" type="number" onkeyup="onlyNumberAmount(this)">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('video_url', 'Video Link:') !!}
    {!! Form::text('video_url', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('Link 3D', 'Link 3D:') !!}
    {!! Form::text('link_iframe', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    <select name="brand_id" class="form-control">
        @foreach ($brands as $brand)
            <option @if (isset($product) && $product->brand_id == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>


<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
    </label>
    <select name="status" class="form-control">
        @foreach (\App\Models\Product::$status as $key => $status)
            <option @if (isset($product) && $product->status == $key) selected @endif value="{{ $key }}">{{ $status }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('default_img', 'Default Img:') !!}
    <input type="file" multiple name="default_img[]" class="form-control">
</div>

<div class="form-group col-sm-6">
    {!! Form::label('multiple_img', 'Multiple Img:') !!}
    <input type="file" multiple name="multiple_img[]" class="form-control">
</div>
<div id="imageList" class="form-group col-sm-6">
</div>

<div class="form-group col-sm-12">
    {!! Form::label('description', 'Mô tả:') !!}
    <textarea class="form-control" id="ckeditor" name="description">
@if (isset($product->description->description))
{{ $product->description->description }}
@endif
</textarea>
</div>
{{-- size phu kien --}}
<div>
    <div>
        <button id="addsize" type="button" class="btn btn-primary">Tạo size cho phụ kiện</button>
    </div>
    <br>
    <div id="container" >
        <!-- Các thẻ div và input được thêm vào đây -->
    </div>
    <br>
</div>



<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-default">Hủy</a>
</div>
@push('scripts')
    <script src="{{ url('libs/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ url('libs/ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('ckeditor_short', {
                height: 300,
            });
            CKEDITOR.replace('ckeditor', {
                height: 300,

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Khi nút "Thêm" được ấn
            $sizeIndex = 0;
            $('#addsize').click(function() {
                // Tạo một div mới
                var newDiv = $('<div>');
                // Thêm một input mới vào trong div cùng với nút xóa
                var newInput = $(`<input min=1 name="size[${$sizeIndex}]">`).attr('type', 'number');
                var deleteButton = $('<button class="btn btn-danger">').text('Xóa');
                newDiv.append(newInput);
                newDiv.append(deleteButton);
                deleteButton.click(function() {
                    // Xóa div hiện tại
                    $(this).parent().remove();
                });

                // Thêm div mới vào trong container
                $('#container').append(newDiv);
                $sizeIndex++;
            });
            function displayExistingImages(images) {
                const imageList = document.getElementById('imageList');

                // Xóa tất cả các ảnh đã hiển thị trước đó
                imageList.innerHTML = '';

                // Lặp qua từng URL ảnh và hiển thị chúng
                images.forEach(function(imageUrl) {
                    const img = document.createElement('img');
                    img.src = imageUrl;
                    img.style.maxWidth = '100px'; // Thay đổi kích thước ảnh nếu cần
                    img.style.marginRight = '5px'; // Tạo khoảng cách giữa các ảnh
                    imageList.appendChild(img);
                });
            }
            document.addEventListener('DOMContentLoaded', function() {
                const existingImages = [
                ];
                displayExistingImages(existingImages);
            });
        });
    </script>
@endpush
