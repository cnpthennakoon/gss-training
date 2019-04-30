{{--{{ $dailyEvaluation->audit_id }}--}}
{{--{{ $audit->id }}--}}

@extends('layouts.daily-evaluations')

@section('content')
    <div class="flex-container">

        <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('daily-evaluations') }}">Daily Evaluations</a></li>
                <li><a href="{{ route('audits.index') }}">Daily Audits</a></li>
                <li class="is-active"><a href="#" aria-current="page">Audit Details</a></li>
            </ul>
        </nav>
        <div class="columns">
            <div class="column">

                <h1 class="title">
                    Audit Details
                </h1>
            </div>
            <div class="column">
                <a href="{{ route('daily-audits.edit', $dailyEvaluation->id) }}" class="button is-primary is-outlined is-pulled-right m-r-10">Edit Details</a>
            </div>
        </div>


        <div class="tile is-ancestor">
            <div class="tile is-vertical is-8">
                <div class="tile">
                    <div class="tile is-parent is-vertical">
                        <article class="tile is-child notification is-white">
                            <p class="title p-b-10">General</p>

                            <div class="field is-horizontal">
                                <label class="label">Scene type : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->scene_type }}
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Probe_id : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->probe_id }}
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">QAT ID : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->qat_id }}
                                </div>
                            </div>

                        </article>
                        <article class="tile is-child notification is-white">
                            <p class="title p-b-10">Tagging Details</p>

                            <div class="field is-horizontal">
                                <label class="label">Tagged Count : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->tagged_count }}
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Price tags count : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->price_tags_count }}
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Not tagged in masking area : &nbsp; &nbsp;</label>
                                <div class="control">
                                    {{ $dailyEvaluation->not_tagged_in_masking_area }}
                                </div>
                            </div>


                            <div class="field is-horizontal">
                                <label class="label">Extra Tags : &nbsp; &nbsp;</label>
                                <div class="control">
                                    {{ $dailyEvaluation->extra_tags }}
                                </div>
                            </div>


                            <div class="field is-horizontal">
                                <label class="label">Missed SKU tags : &nbsp; &nbsp;</label>
                                <div class="control">
                                    {{ $dailyEvaluation->missed_sku_tags_by_qat }}
                                </div>
                            </div>


                            <div class="field is-horizontal">
                                <label class="label">Missed empty tags : &nbsp; &nbsp;</label>
                                <div class="control">
                                    {{ $dailyEvaluation->missed_empty_tags }}
                                </div>
                            </div>

                        </article>
                        <article class="tile is-child notification is-white">
                            <p class="title p-b-20">Image Flaw Details</p>

                            <div class="field is-horizontal">
                                <label class="label">Image flaw status : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->image_flaw_status }}
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Marked flaw : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->marked_flaw_1 }}
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Marked flaw : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->marked_flaw_2 }}
                                </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Correct flaw : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->correct_flaw_1 }}
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <label class="label">Correct flaw : &nbsp; &nbsp; </label>
                                <div class="control">
                                    {{ $dailyEvaluation->correct_flaw_2 }}
                                </div>
                            </div>

                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child notification is-white">
                            <p class="title p-b-20">Error Details</p>

                            <div class="field is-horizontal">
                                <label class="label">Incorrect recognition of facing : &nbsp; &nbsp; </label>
                                    <div class="control">
                                        {{ $dailyEvaluation->facings }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">DVC's not recognized : &nbsp; &nbsp; </label>
                                    <div class="control">
                                        {{ $dailyEvaluation->dvc }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">SKU confusion-Sizes : &nbsp; &nbsp; </label>
                                    <div class="control">
                                        {{ $dailyEvaluation->sku_size }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">SKU flavor : &nbsp; &nbsp; </label>
                                    <div class="control">
                                        {{ $dailyEvaluation->sku_flavor }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Brand tagged when SKU available : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->brand_when_sku_available }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">SKU tagged when brand other should be tagged: &nbsp; &nbsp; </label>
                                    <div class="control">
                                        {{ $dailyEvaluation->sku_when_brand_other_should_tagged }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Category tagged when SKU available: &nbsp; &nbsp; </label>
                                    <div class="control">
                                        {{ $dailyEvaluation->cat_when_sku_available }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">SKU tagged when category other should be tagged : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->sku_when_category_other_should_tagged }}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Confusion with category or category boundaries : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->incorrect_category}}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Brand Tagged when Category Other should be tagged : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->brand_when_category_other_should_tagged}}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Incorrect Brand : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->incorrect_brand}}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Category selected when the brand is available : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->cat_when_brand_available}}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Incorrect SKU form : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->incorrect_sku_form}}
                                    </div>
                            </div>

                            <div class="field is-horizontal">
                                <label class="label">Incorrect Engine Tags : &nbsp; &nbsp;</label>
                                    <div class="control">
                                        {{ $dailyEvaluation->incorrect_engine}}
                                    </div>
                            </div>

                        </article>
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-info">
                        <p class="title p-b-20">Comments :</p>
                        <div class="content">
                            <div class="control">
                                {{ $dailyEvaluation->comment}}
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child notification is-white">
                    <div class="content">
                        <p class="title p-b-20">Responsibility</p>

                        <div class="field is-horizontal">
                            <label class="label">QAT-Negligence : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->qat_negligence}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">QAT-Similar Looking SKU : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->qat_similar_looking_sku}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">QAT : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->qat}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">Engine : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->engine}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">Database Issues : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->database_issue}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">Probe Quality Issue : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->probe_quality_issue}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">New SKU Addition : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->new_sku_addition}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">Storage Method : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->storage_method}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">SKU Deactivation : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->sku_deactivation}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">Other : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->other}}
                            </div>
                        </div>

                        <div class="is-divider" data-content="POS Tagging"></div>

                        <div class="field is-horizontal">
                            <label class="label">Incorrect POS tagging : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->incorrect_pos}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">POS Missing : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->pos_missing}}
                            </div>
                        </div>


                        <div class="is-divider" data-content="Pricing"></div>

                        <div class="field is-horizontal">
                            <label class="label">Incorrect Pricing : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->incorrect_pricing}}
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <label class="label">Pricing Missing : &nbsp; &nbsp;</label>
                            <div class="control">
                                {{ $dailyEvaluation->pricing_missing}}
                            </div>
                        </div>

                    </div>
                </article>
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