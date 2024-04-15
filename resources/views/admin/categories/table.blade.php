<div class="form-group col-sm-12">
<div class="table-responsive">
    <table class="table" id="categories-table">
        <thead>
        <tr>
            <th class="text-center">STT</th>
            <th>Tên danh mục </th>
            <th>Đường dẫn Cha</th>
            <th class="text-center">Trạng Thái</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($categories as $category)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td class="text-center">
                    @if($category->status == -1)
                        <label class="label btn-danger">Deactive</label>
                    @endif
                    @if($category->status == 1)
                        <label class="label btn-success">Active</label>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ url('filter/' . $category->slug) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('categories.edit', [$category->id]) }}" class='btn btn-default btn-xs'><i
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
