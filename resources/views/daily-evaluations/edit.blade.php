@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('daily-evaluations') }}">Daily Evaluations</a></li>
                <li><a href="{{ route('audits.index') }}">Daily Audits</a></li>
                <li class="is-active"><a href="#" aria-current="page">Edit Audit Details</a></li>
            </ul>
        </nav>
        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Edit Audit Details
                </h1>
            </div>
        </div>

        <div class="card">
            <div class="card-content">

                {!! Form::model($dailyEvaluation, ['route' => ['daily-audits.update', $dailyEvaluation->id], 'method' => 'PATCH']) !!}

                @include('_includes.form._text', ['name' => 'scene_type', 'title' => 'Scene Type'])
                @include('_includes.form._text', ['name' => 'probe_id', 'title' => 'Probe ID'])
                @include('_includes.form._text', ['name' => 'qat_id', 'title' => 'QAT ID'])
                @include('_includes.form._number', ['name' => 'tagged_count', 'title' => 'Tagged count'])
                @include('_includes.form._number', ['name' => 'price_tags_count', 'title' => 'Price tags count'])
                @include('_includes.form._number', ['name' => 'not_tagged_in_masking_area', 'title' => 'Not tagged in masking area'])
                @include('_includes.form._number', ['name' => 'extra_tags', 'title' => 'Extra tags'])
                @include('_includes.form._number', ['name' => 'missed_sku_tags_by_qat', 'title' => 'Missed tags by QAT'])
                @include('_includes.form._number', ['name' => 'missed_empty_tags', 'title' => 'Missed empty tags'])

                <div class="is-divider" data-content="Image Flaw"></div>

                @include('_includes.form._text', ['name' => 'image_flaw_status', 'title' => 'Image flaw status'])
                @include('_includes.form._text', ['name' => 'marked_flaw_1', 'title' => 'Marked flaw'])
                @include('_includes.form._text', ['name' => 'marked_flaw_2', 'title' => 'Marked flaw'])
                @include('_includes.form._text', ['name' => 'correct_flaw_1', 'title' => 'Correct flaw'])
                @include('_includes.form._text', ['name' => 'correct_flaw_2', 'title' => 'Correct flaw'])

                <div class="is-divider" data-content="Error Details"></div>

                @include('_includes.form._number', ['name' => 'facings', 'title' => 'Incorrect recognition of facing'])
                @include('_includes.form._number', ['name' => 'dvc', 'title' => 'DVCs not recognized'])
                @include('_includes.form._number', ['name' => 'sku_size', 'title' => 'SKU confusion-Sizes'])
                @include('_includes.form._number', ['name' => 'sku_flavor', 'title' => 'SKU flavor'])
                @include('_includes.form._number', ['name' => 'brand_when_sku_available', 'title' => 'Brand tagged when SKU available'])
                @include('_includes.form._number', ['name' => 'sku_when_brand_other_should_tagged', 'title' => 'SKU tagged when brand other should be tagged'])
                @include('_includes.form._number', ['name' => 'cat_when_sku_available', 'title' => 'Category tagged when SKU available'])
                @include('_includes.form._number', ['name' => 'sku_when_category_other_should_tagged', 'title' => 'SKU tagged when category other should be tagged'])
                @include('_includes.form._number', ['name' => 'incorrect_category', 'title' => 'Confusion with category or category boundaries'])
                @include('_includes.form._number', ['name' => 'brand_when_category_other_should_tagged', 'title' => 'Brand Tagged when Category Other should be tagged'])
                @include('_includes.form._number', ['name' => 'incorrect_brand', 'title' => 'Incorrect Brand'])
                @include('_includes.form._number', ['name' => 'cat_when_brand_available', 'title' => 'Category selected when the brand is available'])
                @include('_includes.form._number', ['name' => 'incorrect_sku_form', 'title' => 'Incorrect SKU form'])
                @include('_includes.form._number', ['name' => 'incorrect_engine', 'title' => 'Incorrect Engine Tags'])

                <div class="is-divider" data-content="Responsibility"></div>

                @include('_includes.form._number', ['name' => 'qat_negligence', 'title' => 'QAT-Negligence'])
                @include('_includes.form._number', ['name' => 'qat_similar_looking_sku', 'title' => 'QAT-Similar Looking SKU :'])
                @include('_includes.form._number', ['name' => 'qat', 'title' => 'QAT'])
                @include('_includes.form._number', ['name' => 'engine', 'title' => 'Engine'])
                @include('_includes.form._number', ['name' => 'database_issue', 'title' => 'Database Issues'])
                @include('_includes.form._number', ['name' => 'probe_quality_issue', 'title' => 'Probe Quality Issue'])
                @include('_includes.form._number', ['name' => 'new_sku_addition', 'title' => 'New SKU Addition'])
                @include('_includes.form._number', ['name' => 'storage_method', 'title' => 'Storage Method'])
                @include('_includes.form._number', ['name' => 'sku_deactivation', 'title' => 'SKU Deactivation'])
                @include('_includes.form._number', ['name' => 'other', 'title' => 'Other'])

                <div class="is-divider" data-content="POS Tagging"></div>

                @include('_includes.form._number', ['name' => 'incorrect_pos', 'title' => 'Incorrect POS tagging'])
                @include('_includes.form._number', ['name' => 'pos_missing', 'title' => 'POS Missing'])

                <div class="is-divider" data-content="Pricing"></div>

                @include('_includes.form._number', ['name' => 'incorrect_pricing', 'title' => 'Incorrect Pricing'])
                @include('_includes.form._number', ['name' => 'pricing_missing', 'title' => 'Pricing Missing'])


                <div class="is-divider" data-content="Comments"></div>

                @include('_includes.form._textarea', ['name' => 'comment', 'title' => 'Comment'])

                @include('_includes.form._save')

                {!! Form::close() !!}

            </div>
        </div>







    </div>
@endsection

@section('scripts')

    <script>
        var app = new Vue({
            el: '#app',
            data: {
            }
        })
    </script>

@endsection