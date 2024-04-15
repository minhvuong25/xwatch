<!-- Agent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agent_id', 'Agent Id:') !!}
    {!! Form::text('agent_id', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
</div>

<!-- Entity Type Field -->
<div class="form-group col-sm-6 pull-left">
    {!! Form::label('source', 'Source:') !!}
    <select name="source" class="form-control">
        @foreach(\App\Models\UserAgent::$arrDataSource as $val)
            <option @if(isset($userAgent->source) && $userAgent->source == $val) selected @endif value="{{$val}}">{{$val}}</option>
        @endforeach
    </select>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userAgents.index') }}" class="btn btn-default">Hủy</a>
</div>
