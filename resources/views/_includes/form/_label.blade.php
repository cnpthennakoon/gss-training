<div class="control is-horizontal">
	<div class="control-label">
    	{!! Form::label($name, $title, ['class' => 'label']) !!}
	</div>
	<div class="control">
        {!! Form::text($name, null, ['class' => 'input is-disabled']) !!}
        {!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
	</div>
</div>