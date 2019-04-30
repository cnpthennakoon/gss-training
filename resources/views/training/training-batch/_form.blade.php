<div class="columns">
    <div class="column is-half-desktop">

        @include('_includes.form._select', ['name' => 'project_id', 'title' => 'Project', 'list'=> $projectsList])
        @include('_includes.form._select', ['name' => 'training_project_status_id', 'title' => 'Project Status', 'list' => $projectStatusList])
        @include('_includes.form._select', ['name' => 'training_center_id', 'title' => 'Training Center', 'list' => $trainingCentersList])

    </div>
    <div class="column is-half-desktop">

        @include('_includes.form._select', ['name' => 'training_batch_status_id', 'title' => 'Batch Status', 'list' => $batchStatusList])

        @include('_includes.form._select', ['name' => 'training_batch_type_id', 'title' => 'Batch Type', 'list' => $trainingBatchTypesList])
        <div class="control is-horizontal">
            <div class="control-label">
                <label for="training_nature_id" class="label">Nature of Training</label>
            </div>
            <div class="control">
        <span class="select">
            <select id="nature" name="training_nature_id" class="select_nature">
                <option value="" selected="selected">Select Training Nature...</option>
            </select>
    	</span>
            </div>
        </div>

    </div>
</div>

<div class="is-divider" data-content="Dates"></div>

<div class="columns">
    <div class="column is-half-desktop">
        <label for="start_date" class="label m-t-20">Start Date :</label>
        <input type="date" name="start_date">
    </div>
    <div class="column is-half-desktop">
        <label for="live_date" class="label m-t-20">Live Date :</label>
        <input type="date" name="live_date">
    </div>
</div>

<div class="is-divider" data-content="QAT Counts"></div>

<div class="columns">
    <div class="column is-half-desktop">
@include('_includes.form._number', ['name' => 'received_head_count', 'title' => 'Received Head Count'])
@include('_includes.form._number', ['name' => 'hr_attrition_count', 'title' => 'HR Attrition Count'])
@include('_includes.form._number', ['name' => 'training_attrition_count', 'title' => 'Training Attrition Count'])
    </div>
    <div class="column is-half-desktop">
@include('_includes.form._number', ['name' => 'first_exam_passed_count', 'title' => 'First Exam Passed Count'])
@include('_includes.form._number', ['name' => 'second_exam_passed_count', 'title' => 'Second Exam Passed Count'])
    </div>
</div>
@include('_includes.form._text', ['name' => 'comment', 'title' => 'Comments'])
@include('_includes.form._save')