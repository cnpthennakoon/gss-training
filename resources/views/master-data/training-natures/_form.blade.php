@include('_includes.form._text', ['name' => 'name', 'title' => 'Name'])
@include('_includes.form._select', ['name' => 'training_batch_type_id', 'title' => 'Batch Type', 'list' => $trainingBatchTypesList])
@include('_includes.form._save')
