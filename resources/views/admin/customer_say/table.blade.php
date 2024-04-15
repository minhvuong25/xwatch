<div class="table-responsive">
    <table class="table" id="pageNews-table">
        <thead>
        <tr>
            <th>Tên khách hàng</th>
            <th>Link video</th>
            <th>Mô tả</th>
            <th>Ảnh đại diện</th>
            <th>Ảnh Video</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customerSays as $customerSays)
            <tr>
                <td>{{ $customerSays->customer_name }}</td>
                <td>{{ $customerSays->link_video }}</td>
                <td>{{ $customerSays->description }}</td>
                <td>@if(isset($customerSays->default_image) && !empty($customerSays->default_image))
                    <img width="88"
                         src="{!! asset('uploads/customer/'. $customerSays->default_image) !!}">
                @endif</td>


                <td>@if(isset($customerSays->video_image) && !empty($customerSays->video_image))
                    <img width="88"
                         src="{!! asset('uploads/customer/'. $customerSays->video_image) !!}">
                @endif</td>


                <td class="text-center">
                    @if ($customerSays->status == 1)
                       Đang hiện
                    @else
                    Đang ẩn
                    @endif
                </td>
                <td class="text-center">
                    {!! Form::open(['route' => ['customerSays.destroy', $customerSays->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customerSays.show', [$customerSays->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('customerSays.edit', [$customerSays->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
