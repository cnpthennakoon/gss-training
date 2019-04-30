<div class="columns">
    <div class="column is-half-desktop">

        @include('_includes.form._text', ['name' => 'qat_id', 'title' => 'QAT ID'])
        @include('_includes.form._select', ['name' => 'training_center_id', 'title' => 'Training Center', 'list' => $trainingCenterList])
{{--        @include('_includes.form._select', ['name' => 'project_id', 'title' => 'Project', 'list' => $projectsList])--}}

        <div class="control is-horizontal m-t-15">

            <div class="control-label">
                <label for="training_batch_id" class="label">Project</label>
            </div>

            <div class="control">
                <span class="select">
                    <select id="training_batch" name="training_batch_id" class="select_training_batch">
                        <option value="" selected="selected">Select Training Project...</option>
                    </select>
                </span>
            </div>

        </div>

    </div>
    <div class="column is-half-desktop">
        <label for="last_working_date" class="label m-t-20">Last Working Date :</label>
        <input type="date" name="last_working_date">

        @include('_includes.form._select', ['name' => 'attrition_type_id', 'title' => 'Attrition Type', 'list' => $attritionTypeList])
        @include('_includes.form._select', ['name' => 'attrition_reason_id', 'title' => 'Attrition Reason', 'list' => $attritionReasonList])


    </div>
</div>
@include('_includes.form._text', ['name' => 'comment', 'title' => 'Comment'])



@include('_includes.form._save')