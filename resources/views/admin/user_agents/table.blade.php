<div class="table-responsive">
    <table class="table" id="userAgents-table">
        <thead>
            <tr>
                <th>Agent Id</th>
        <th>Source</th>
                <th colspan="3">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userAgents as $userAgent)
            <tr>
                <td>{{ $userAgent->agent_id }}</td>
            <td>{{ $userAgent->source }}</td>
                <td>
                    {!! Form::open(['route' => ['userAgents.destroy', $userAgent->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('userAgents.show', [$userAgent->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('userAgents.edit', [$userAgent->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
