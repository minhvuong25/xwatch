<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Ảnh</th>
                <th class="text-center">Hiển thị</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($logos as $logo)
                <tr>
                    <td class="text-center">{{ $index }}</td>
                    <td class="text-center"><img width="50px"   src="{{ asset($logo->source_url) }}"></td>
                    <td class="text-center"><div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="radio"  name="fav_language" onclick='UpdateStatus({{$logo->id}})'  id="customSwitch3" {{ $logo->status == 1 ? ' checked ' : '' }}">
                      </div>
                    </td>
                    <td class="text-center">
                        {!! Form::open(['route' => ['logo.destroy', $logo->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('logo.edit', [$logo->id]) }}" class='btn btn-default btn-xs'><i
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

