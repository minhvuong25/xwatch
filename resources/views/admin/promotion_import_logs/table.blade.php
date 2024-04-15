<div class="table-responsive">
    <table class="table" id="promotionImportLogs-table">
        <thead>
        <tr>
            <th width="500">Data</th>
            <th>Message</th>
            <th>Ngày Tạo</th>
            <th colspan="3">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotionImportLogs as $promotionImportLog)
            <?php
                $data = json_decode($promotionImportLog->data, true);
            ?>
            <tr>
                <td width="500">
                    @if(isset($data["price_miss_matched"]))
                        <label>Giá không khớp:</label> <br>
                        @foreach($data["price_miss_matched"] as $value)
                            <span> {{ $value["sku"] }} </span>
                        @endforeach
                    @endif
                    <br>
                    <br>
                    @if(isset($data["not_available"]))
                        <label>SKU Không tồn tại:</label> <br>
                        @foreach($data["not_available"] as $value)
                            <span> {{ $value["sku"] }} </span>
                        @endforeach
                    @endif
                </td>
                <td>{{ $promotionImportLog->message }}</td>
                <td>{{ $promotionImportLog->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['promotionImportLogs.destroy', $promotionImportLog->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('promotionImportLogs.show', [$promotionImportLog->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('promotionImportLogs.edit', [$promotionImportLog->id]) }}"
                           class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $promotionImportLogs->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
