<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Thông tin</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bank as $bank)
                <tr>
                    <td class="text-center">{{ $bank->id }}</td>
                    <td>{!! $bank->information !!}</td>
                    <td class="text-center">
                        {!! Form::open(['route' => ['bank.destroy', $bank->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('bank.edit', [$bank->id]) }}" class='btn btn-default btn-xs'><i
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
            @endforeach
        </tbody>
    </table>
</div>

