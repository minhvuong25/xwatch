<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Tên video</th>
                <th>Mô tả thêm</th>   
                <th>Link video</th>
                <th>Ảnh</th>
                {{-- <th>Status</th> --}}
                <th colspan="3">Hành động</th>
       
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($videos as $videos)
                <tr>                
                    <td class="text-center">{{ $index }}</td>
                    <td>{{ $videos->name }}</td>
                    <td>{{ $videos->description }}</td>                                   
                    <td>{{ $videos->link }}</td>
                    <td>@if(isset($videos->image) && !empty($videos->image))
                        <img width="88"
                             src="{!! asset('uploads/videoHome/'. $videos->image) !!}">
                    @endif</td>
                    {{-- <td><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="radio"  name="fav_language" onclick='UpdateStatus({{$videos->id}})'  id="customSwitch3" {{ $videos->status == 1 ? ' checked ' : '' }}>
                      </div></td> --}}
                    <td>
                        {!! Form::open(['route' => ['videoHome.destroy', $videos->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('videoHome.edit', [$videos->id]) }}" class='btn btn-default btn-xs'><i
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

