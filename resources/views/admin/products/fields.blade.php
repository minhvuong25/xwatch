<!-- Parent Id Field -->
<style>
     .input_size{
        width: 100px;
        display: inline;
        margin-top:5px ;
     }
</style>
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Danh mục sản phẩm:') !!}
    <select class="form-control" name="category_id" id="mySelect">
        @php
        $idsToShow = [17, 18 , 7  , 8 , 9];
        $result = array_filter($categories, function($item) use ($idsToShow) {
         return in_array($item['id'], $idsToShow);
          });
        @endphp
        @foreach ($result as $val)
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
    {!! Form::label('sku', 'Mã sản phẩm:') !!}
    {!! Form::text('sku', null, ['class' => 'form-control', 'maxlength' => 30, 'maxlength' => 30]) !!}
</div>
<div class="form-group col-sm-6" style="display: none" id="myDiv2">
    <label for="">Chọn Loại phụ kiện</label>
    <select name="ccessory_type"  class="form-control" >
        @foreach (\App\Models\Product::$ccessory_type as $key => $ccessory_type)
            <option @if (isset($product) && $product->ccessory_type == $key) selected @endif value="{{ $key }}">{{ $ccessory_type }}
            </option>
        @endforeach
        {{-- <option value=""><b>Chọn Loại Phụ Kiện</b></option>
        <option value="1">Dây đồng hồ</option>
        <option value="2">Khoá đồng hồ</option>
        <option value="3">Hộp đựng đồng hồ</option>
        <option value="4">Hộp xoay đồng hồ</option>
        <option value="5">Dụng cụ vệ sinh</option> --}}
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên sản phẩm:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Giá bán sản phẩm:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255, 'placeholder' => 'Mặc định là ‘Liên hệ’']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Giá gốc:') !!}
    {!! Form::number('compare_price', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<div class="form-group col-sm-6" style="display: block" id="myDiv3">
    {!! Form::label('brand_id', 'Thương Hiệu:') !!}
    <select name="brand_id" class="form-control">
        @foreach ($brands as $brand)
            <option @if (isset($product) && $product->brand_id == $brand->id) selected @endif value="{{ $brand->id }}">{{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-6" style="display: block" id="myDiv3">
    {!! Form::label('warranty', 'Bảo hành:') !!}
    <select name="warranty_id" class="form-control">
    @if($warranty->count() === 0)
        <option value="" selected>Chưa có gói bảo hành</option>
    @else
        @foreach ($warranty as $warrant)
            <option value="{{ $warrant->id }}" @if(isset($product) && $product->warranty_id == $warrant->id) selected @endif>{{ $warrant->title }}</option>
        @endforeach
    @endif
</select>


</div>

<div class="form-group col-sm-6">
    {!! Form::label('status', 'Trạng Thái:') !!}
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
    {!! Form::label('type', 'Hiển thị:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('type', 0) !!}
    </label>
    <select name="type" class="form-control">
        @foreach (\App\Models\Product::$type as $key => $type)
            <option @if (isset($product) && $product->type == $key) selected @endif value="{{ $key }}">{{ $type }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('default_img', 'Hình ảnh sản phẩm:') !!}
    <div class="note-info">
        <p>- Bạn có thế chọn nhiều file cùng một lúc bằng cách giữ thêm phím Ctrl.</p>
    </div>
    <label class="btn bg-green" for="imageInput"><i class="fa fa-plus"></i> Chọn file ảnh</label>
    <input type="file" multiple name="default_img[]" class="form-control" id="imageInput" style="display: none;">
    <ul id="imageList">
    @if (!empty($product->images))
    @foreach($product->images as $image)
    <li class="ui-state-default">
        <div class="imgs">
            <img width="150px" src="{{route('productImageShow', ['id' => $image->product_id, 'fileName' => $image->name])}}">
        </div>
    </li>
    @endforeach
    @endif
    </ul>
</div>
<div class="form-group col-sm-6" style="display: none" id="myDiv">
    <div>
        <button id="addsize" class="btn btn-primary" type="button">Tạo size</button>
    </div>
    <div id="container" >
    </div>
</div>




<div class="form-group col-sm-12">
    {!! Form::label('description', 'Mô tả sản phẩm:') !!}
    <textarea class="form-control" id="ckeditor" name="description">
@if (isset($product->description))
{!! $product->description ?? '' !!}
@endif
</textarea>
</div>

<div class="form-group col-sm-12">
    {!! Form::label('promotionalInformation', 'Thông tin khuyến mại :') !!}
    <textarea class="form-control" required id="ckeditor2" name="promotionalInformation">
@if (isset($promotionalInformation->description))
{!! $promotionalInformation->description ?? '' !!}
@endif
</textarea>
</div>




<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-default">Hủy</a>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace("ckeditor");
            CKEDITOR.replace("ckeditor2");
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
                var newInput = $(`<input min=1 class="form-control input_size"  name="size[${$sizeIndex}]">`).attr('type', 'number');
                var deleteButton = $('<button class="glyphicon glyphicon-trash btn btn-danger">').text(' ');
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
        });

        const categotyElement = document.getElementById('mySelect');
        handleProductBrand(categotyElement.value);
        categotyElement.addEventListener('change', () => handleProductBrand(categotyElement.value));
        function handleProductBrand(brandId) {
            if (brandId == 18) {
                document.getElementById('myDiv').style.display = 'block';
                document.getElementById('myDiv2').style.display = 'block';
                document.getElementById('myDiv3').style.display = 'none';
            } else {
                document.getElementById('myDiv').style.display = 'none';
                document.getElementById('myDiv2').style.display = 'none';
                document.getElementById('myDiv3').style.display = 'block';
            }
        } 
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const files = event.target.files; // Lấy danh sách các tệp đã chọn
            const imageList = document.getElementById('imageList');

            // Lặp qua từng tệp ảnh và hiển thị chúng
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                // Đọc tệp ảnh và thêm nó vào danh sách hiển thị
                reader.onload = function(e) {
                    // Tạo một thẻ li mới
                    const li = document.createElement('li');
                    li.className = 'ui-state-default';
                    li.id = 'img_' + Date.now(); // Tạo một id duy nhất cho mỗi thẻ li

                    // Tạo một thẻ div mới để chứa ảnh
                    const div = document.createElement('div');
                    div.className = 'imgs';

                    // Tạo thẻ img mới và thiết lập src là đường dẫn của tệp ảnh
                    const img = document.createElement('img');
                    img.src = e.target.result;

                    // Thêm thẻ img vào thẻ div
                    div.appendChild(img);

                    // Tạo nút xoá và bắt sự kiện click để xoá ảnh khi được nhấp
                    const deleteButton = document.createElement('button');
                    deleteButton.innerHTML = '<i class="fa fa-trash"></i>'; 
                    deleteButton.className = 'btn btn-danger btn-remove-image';

                    deleteButton.addEventListener('click', function() {
                        // Xoá phần tử li chứa ảnh khỏi danh sách
                        li.remove();
                    });

                    // Thêm nút xoá vào thẻ div
                    div.appendChild(deleteButton);

                    // Thêm thẻ div vào thẻ li
                    li.appendChild(div);

                    // Thêm thẻ li vào danh sách
                    imageList.appendChild(li);
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush

