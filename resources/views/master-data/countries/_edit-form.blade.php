@include('_includes.form._text', ['name' => 'name', 'title' => 'Name'])
@include('_includes.form._select', ['name' => 'region_id', 'title' => 'Region', 'list' => $regionsList])
@include('_includes.form._save')