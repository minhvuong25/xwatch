<div class="table">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Trạng Thái</th>
                <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 1 @endphp
        @foreach($products as $product)
            <tr>
                <td>{{$i++}}</td>
                <td>
                    {{-- @php dd($product->images->first()->name) @endphp --}}
                    @if ($product->images->first() === null)
                        <img src="" alt="donghothinhvuong.bota.vn">
                    @else
                        <img width="160" height="120"
                        src="{{route("productImageShow", [
                            "id" => $product->id,
                            "fileName" => $product->images->last()->name ?? "default.jpg"
                            ])}}">
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', [$product->id]) }}" title="{{ $product->name }}">{{ $product->name }}</a>
                </td>
                <td>{{ $product->sku }}</td>
                
                <td>
                    @if (!empty($product->price))
                        {{ number_format($product->price, 0, '.', '.') }} ₫
                    @else
                        Liên hệ
                    @endif
                </td>
                <td>
                    <input data-id="{{ $product->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $product->status == 1 ? 'checked' : '' }}>
                </td>
                <td>
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('web.product.show', $product->slug) }}" target="_blank"
                            class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('products.edit', [$product->id]) }}"
                           class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}

                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
<script>
    // alert(2);
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 2; 
          var id = $(this).data('id'); 
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{route("productChangeStatus")}}',
              data: {'status': status, 'id': id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
  
  <script>
      $(document).ready(function() {
          // Kích hoạt sự kiện kéo và thả bằng jQuery UI
          $("#menu-list").sortable({
              axis: "y", // Cho phép kéo và thả theo chiều dọc
              update: function(event, ui) {
                  // Khi hoàn thành kéo và thả, lấy vị trí mới của các mục menu
                  var newPositions = {};
                  $("#menu-list").find(".menu-item").each(function(index) {
                      var itemId = $(this).data("menu-id");
                      newPositions[itemId] = index;
                  });
  
                  // Gửi yêu cầu AJAX để cập nhật vị trí menu
                  $.ajax({
                      type: "POST",
                      url: "/api/menu/reorder", // Điều chỉnh đường dẫn thực tế
                      data: { new_positions: newPositions },
                      dataType: "json",
                      success: function(response) {
                          console.log(response.message);
                      },
                      error: function(xhr, textStatus, errorThrown) {
                          console.error("Có lỗi xảy ra khi cập nhật thứ tự menu.");
                      }
                  });
              }
          });
      });
  </script>