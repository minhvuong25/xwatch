<div class="form-group col-sm-12">
    {!! Form::label('name', 'Tiêu đề:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('content', 'Nội dung:') !!}
    <textarea class="form-control" id="ckeditor" name="content">@if(isset($productManual->content)){{$productManual->content}}@endif</textarea>
</div>
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('productManual.index') }}" class="btn btn-default">Hủy</a>
</div>


@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            CKEDITOR.replace('ckeditor');
        });
    </script>
@endpush
