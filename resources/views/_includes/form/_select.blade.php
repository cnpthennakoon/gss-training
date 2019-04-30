<div class="control is-horizontal m-t-20">
    <div class="control-label">
        {!! Form::label($name, $title, ['class' => 'label']) !!}
    </div>
    <div class="control">
    	<span class="select">
	        {!! Form::select($name, $list, null) !!}
	        {!! $errors->first($name, '<span class="help is-danger">:message</span>') !!}
    	</span>
    </div>
</div>

@push('scripts')
<script>
    $(function() { $('#{{ $name }}').select2(); });
</script>
@endpush
