<div class="columns">
    <div class="column is-half-desktop">

        @include('_includes.form._text', ['name' => 'qat_id', 'title' => 'QAT ID'])

        <div class="control is-horizontal m-t-20 m-b-15">
            <div class="control-label">
                <label for="attrition_batch_id" class="label">Training Batch</label>
            </div>
            <div class="control">
                <span class="select">
                    <select id="training_batch_id" name="training_batch_id">
                        @foreach($training_batch_data as $data)

                            @if($data->id == $attrition->training_batch_id)
                                <option value={{ $data->id }} selected="selected">{{ $data->name }},{{ $data->slug }}, {{ $data->received_head_count }}, {{ $data->start_date }}</option>
                            @else
                                <option value={{ $data->id }}>{{ $data->name }},{{ $data->slug }}, {{ $data->received_head_count }}, {{ $data->start_date }}</option>
                            @endif
                        @endforeach
                    </select>

                </span>
            </div>
        </div>



        @include('_includes.form._date', ['name' => 'last_working_date', 'title' => 'Last Working Date :'])
    </div>
    <div class="column is-half-desktop">



        @include('_includes.form._select', ['name' => 'attrition_type_id', 'title' => 'Attrition Type', 'list' => $attritionTypeList])
        @include('_includes.form._select', ['name' => 'attrition_reason_id', 'title' => 'Attrition Reason', 'list' => $attritionReasonList])


    </div>
</div>
@include('_includes.form._text', ['name' => 'comment', 'title' => 'Comment'])





@include('_includes.form._save')