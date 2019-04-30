<div class="control is-horizontal">
	<div class="control-label">
    	{!! Form::label($name, $title, ['class' => 'label']) !!}
	</div>
	<div class="control">
        {!! Form::textarea($name, null, ['class' => 'textarea', 'placeholder' => $title, 'rows' => 2]) !!}
        {!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
	</div>
</div>