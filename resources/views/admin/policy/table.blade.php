<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Tên chính sách</th> 
                <th>Ảnh</th>
                <th colspan="3">Hành động</th>
       
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($policies as $policy)
                <tr>                
                    <td class="text-center">{{ $index }}</td>
                    <td>{{ $policy->title }}</td>
                    <td>@if(isset($policy->image) && !empty($policy->image))
                        <img width="88"
                             src="{!! asset('uploads/policy/'. $policy->image) !!}">
                    @endif</td>
                    <td>
                        {!! Form::open(['route' => ['policy.destroy', $policy->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('policy.edit', [$policy->id]) }}" class='btn btn-default btn-xs'><i
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

