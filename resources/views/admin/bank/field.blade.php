
<div class="form-group col-sm-12">
    {!! Form::label('information', 'Chỉnh sửa thông tin ngân hàng:') !!}
    <textarea class="form-control" id="ckeditor" name="information">
@if (isset($bank->information))
{!! $bank->information ?? '' !!}
@endif
</textarea></div>

<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bank.index') }}" class="btn btn-default">Hủy</a>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('ckeditor');
        });
    </script>
 
@endpush