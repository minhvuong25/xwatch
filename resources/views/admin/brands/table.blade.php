<div class="table-responsive">
    <table class="table" id="brands-table">
        <thead>
            <tr>
                <th width="20" class="text-center">STT</th>
                <th width="100">Hình ảnh</th>
                <th>Tên thương hiệu</th>
                <th class="text-center">Vị trí</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($brands as $brand)
            <tr>
                <td width="20" class="text-center">{{ $index }}</td>
                <td width="100">@if(isset($brand->image) && !empty($brand->image))
                    <img
                         src="{!! asset('uploads/brands/'. $brand->image) !!}">
                @endif</td>
                <td>{{ $brand->name }}</td>
                <td class="text-center">{{ $brand->position ?? ''}}</td>
                <!-- <td>{{\App\Models\Brand::$status[$brand->status]}}</td>  -->
                <td>
                      {!! Form::open(['route' => ['brands.destroy', $brand->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('brands.edit', [$brand->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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



    <div>
        {{ $brands->links() }}
    </div>
</div>
