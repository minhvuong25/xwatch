<div class="table-responsive">
    <table class="table" id="brands-table">
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th>Số điện thoại khách</th>
                <th>Sản phẩm</th>
                <th class="text-center">Hành động</th>
            </tr>
        </thead>
        <tbody>
        @php
            $index = 1; 
        @endphp
        @foreach($consultations as $consultation)
            <tr>
                <td class="text-center">{{ $index }}</td>
                <td>{{ $consultation->phone }}</td>
                <td>
                @php
                    $data = \app\models\Product::find($consultation->product_id);
                @endphp
                @if(isset($data->slug) && !empty( $data->slug)){
                   <a href="{{ route('web.product.show', $data->slug) }}" title="{{ $data->name }}">{{ $data->name }}</a>
                }
                @else
                @endif
                </td>
                <td>
                      {!! Form::open(['route' => ['consultation.destroy', $consultation->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
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
