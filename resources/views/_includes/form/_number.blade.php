<div class="control is-horizontal m-t-15">
	<div class="control-label">
    	{!! Form::label($name, $title, ['class' => 'label']) !!}
	</div>
	<div class="control">
        {!! Form::number($name, null, ['class' => 'input', 'value' => 0]) !!}
        {!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
	</div>
</div>