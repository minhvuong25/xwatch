<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Tiêu đề</th>
                <th>Mô tả thêm</th>
                <th>Link</th>
                <th class="text-center">Ảnh</th>
                <th class="text-center">Vị trí</th>
                <th class="text-center">Trạng thái</th>
                <th colspan="3">Hành động</th>
       
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($ads as $ads)
                <tr>
                <td class="text-center">{{ $index }}</td>
                    <td>{{ $ads->title }}</td>
                    <td>{!! $ads->description !!}</td>
                    <td>{{ $ads->link }}</td>
                    <td class="text-center">@if(isset($ads->image) && !empty($ads->image))
                        <img width="88"
                             src="{!! asset('uploads/imageHome/'. $ads->image) !!}">
                    @endif</td>
                    <td class="text-center">
                        @if ($ads->position == 1)
                            Trên
                        @else
                            Dưới
                        @endif
                    </td>
                    <td class="text-center">
                        <input data-id="{{ $ads->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                         data-on="Hiện" data-off="Ẩn" {{ $ads->status == 1 ? 'checked' : '' }}>
                    </td>
                    {{-- <td><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="radio"  name="fav_language" onclick='UpdateStatus({{$ads->id}})'  id="customSwitch3" {{ $ads->status == 1 ? ' checked ' : '' }}>
                      </div></td> --}}
                    <td>
                        {!! Form::open(['route' => ['ads.destroy', $ads->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('ads.edit', [$ads->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirm('Are you sure?')",
                            ]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @php
                $index++; 
            @endphp
            @endforeach
        </tbody>
    </table>
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
              url: '{{route("adsChangeStatus")}}',
              data: {'status': status, 'id': id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
