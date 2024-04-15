<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Tên bảo hành</th>
                <!-- <th>Mô tả thêm</th>    -->
                <th>Ảnh</th>
                <th colspan="3">Hành động</th>
       
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($warranty as $warrant)
                <tr>                
                    <td class="text-center">{{ $index }}</td>
                    <td>{{ $warrant->title }}</td>
                    <!-- <td>{{ $warrant->description }}</td>   -->
                    <td>@if(isset($warrant->image) && !empty($warrant->image))
                        <img width="88"
                             src="{!! asset('uploads/warranty/'. $warrant->image) !!}">
                    @endif</td>
                   
                    <td>
                        {!! Form::open(['route' => ['warranty.destroy', $warrant->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('warranty.edit', [$warrant->id]) }}" class='btn btn-default btn-xs'><i
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

