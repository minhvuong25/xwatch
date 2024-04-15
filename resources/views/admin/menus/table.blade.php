<div class="table-responsive">
    <table class="table" id="menus-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Tên</th>
            <th>Link đến</th>
            <th class="text-center">Hiển thị ở footer</th>
            <th class="text-center">Sắp xếp</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($menus as $menu)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>
                    @if($menu["level"] == 1){{ "----" }}@endif
                    @if($menu["level"] == 2){{ "------" }}@endif
                    <a href="{{ route('menus.edit', [$menu->id]) }}" class='btn btn-default btn-xs'>
                        {{$menu["name"]}}
                    </a>
                </td>
                <td>{{ $menu->url }}</td>
                <td class="text-center">
                @if($menu->parent_id == '0' )
                    <input data-id="{{ $menu->id }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $menu->location == 1 ? 'checked' : '' }}>
                @else
                </td>
                @endif
                <td class="text-center">{{ $menu->position }}</td>
                <td class="text-center">
                    {!! Form::open(['route' => ['menus.destroy', $menu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ $menu->url }}" target="_blank" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('menus.edit', [$menu->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
    $(function() {
      $('.toggle-class').change(function() {
          var location = $(this).prop('checked') == true ? 1 : 0;
          var id = $(this).data('id');
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '{{route("changelocation")}}',
              data: {'location': location, 'id': id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
