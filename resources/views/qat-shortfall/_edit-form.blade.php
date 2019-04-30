{{ Form::hidden('project_id', $qatShortfall->project_id) }}
@include('_includes.form._number', ['name' => 'gssc_shortfall', 'title' => 'GSSC Shortfall'])
@include('_includes.form._number', ['name' => 'gssk_shortfall', 'title' => 'GSSK Shortfall'])
@include('_includes.form._number', ['name' => 'igs_shortfall', 'title' => 'IGS Shortfall'])

@include('_includes.form._save')