<div class="table-responsive">
    <table class="table" id="banners-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th>Đường dẫn</th>
                <th>Sắp xếp</th>
                <th>Trạng Thái</th>
                <th class="text-center">Kiểu hiển thị</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index = 1; 
            @endphp
            @foreach ($banners as $banner)
                <tr>
                    <td class="text-center">{{ $index }}</td>
                    <td>
                        @if (!empty($banner->name))
                            <img width="150px" src="{{ asset($banner->path) }}">
                        @endif
                    </td>
                    <td class="text-center">{{ $banner->title }}</td>
                    <td>{{ $banner->url }}</td>
                    <td class="text-center">{{ $banner->slost }}</td>
                    <td>
                        @if ($banner->status == 0)
                            <span class="btn status_item red-stripe">Đang ẩn</span>
                            @endif @if ($banner->status == 1)
                            <span class="btn status_item green-stripe">Đang hiện</span>
                            @endif
                    </td>
                    <td class="text-center">
                        @if ($banner->type == 0)
                            <label class="btn btn-success">Trang chủ</label>
                        @elseif($banner->type == 1)
                            <label class="btn btn-primary">Chi tiết sản phẩm</label>
                        @elseif($banner->type == 2)
                            <label class="btn btn-info">Page trả góp</label>
                        @endif
                    </td>
                    {{-- <td>
                    @if ($banner->is_mobile == \App\Models\Banner::BANNER_IS_MOBILE_WEB) {{"Mobile"}}  @endif
                    @if ($banner->is_mobile == \App\Models\Banner::BANNER_IS_WEBSITE) {{"Web"}} @endif
                </td> --}}
                    {{-- <td>{{\App\Models\Banner::$aryLocationGroup[$banner->location_group]}}</td> --}}
                    <td>
                        {!! Form::open(['route' => ['banners.destroy', $banner->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                             <!-- <a href="{{ route('banners.show', [$banner->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a> -->
                            <!-- <a href="{{ route('banners.edit', [$banner->id]) }}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>  -->
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
