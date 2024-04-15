<div class="table-responsive" style="display: flex">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Email</th>
                <th>Tên cửa hàng</th>
                <th>Địa Chỉ</th>
                <th>Số Điện thoại</th>
                <th>Tỉnh thành</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{ $logos }} --}}
            @foreach ($storeAddresses as $storeAddress)
                <tr>
                    <td class="text-center">{{ $storeAddress->id }}</td>
                    <td>{{ $storeAddress->email }}</td>
                    <td>{{ $storeAddress->name }}</td>
                    <td>{{ $storeAddress->address }}</td>
                    <td>{{ $storeAddress->phone }}</td>
                    <td>{{ $storeAddress->provinces->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['storeAddresses.destroy', $storeAddress->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('storeAddresses.edit', [$storeAddress->id]) }}" class='btn btn-default btn-xs'><i
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
