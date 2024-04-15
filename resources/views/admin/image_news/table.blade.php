<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Link </th>
                <th class="text-center">Ảnh</th>
                <th colspan="3" class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($imageNew as $imageNew)
                <tr>
                    <td class="text-center">{{ $index }}</td>
                    <td>{{ $imageNew->link }}</td>
                    <td class="text-center">@if(isset($imageNew->image) && !empty($imageNew->image))
                        <img width="88"
                             src="{!! asset('uploads/imageNew/'. $imageNew->image) !!}">
                    @endif</td>
                    {{-- <td><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="radio"  name="fav_language" onclick='UpdateStatus({{$imageNew->id}})'  id="customSwitch3" {{ $imageNew->status == 1 ? ' checked ' : '' }}>
                      </div></td> --}}
                    <td class="text-center">
                        {!! Form::open(['route' => ['imageNew.destroy', $imageNew->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('imageNew.edit', [$imageNew->id]) }}" class='btn btn-default btn-xs'><i
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

