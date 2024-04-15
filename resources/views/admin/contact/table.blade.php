<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Số điện thoại/Email</th>
                <th>Nội dung</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($contacts as $contact)
                <tr>
                    <td class="text-center">{{ $index }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->content }}</td>
                    <td class="text-center">
                        {!! Form::open(['route' => ['contact.destroy', $contact->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('contact.edit', [$contact->id]) }}" class='btn btn-default btn-xs'><i
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
