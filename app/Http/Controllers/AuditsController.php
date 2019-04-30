<?php

namespace App\Http\Controllers;

use App\Audit;
use App\DailyEvaluation;
use App\ErrorTypeData;
use App\ImageFlaw;
use App\ImageFlawData;
use App\PosData;
use App\PricingData;
use App\ResponsibilityData;
use App\Tagging;
use Illuminate\Http\Request;

class AuditsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $audits = Audit::where('status', 0)->get();

        return view('audits.index')->withAudits($audits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {

        return view('audits.show')->withAudit($audit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function  submit_audit($id)
    {

        $imageFlaws = ImageFlaw::all();

        $audit = Audit::findOrFail($id);
        $audit->status = 1;
        $audit->save();

        foreach ($audit->dailyEvaluation as $data){

            $tagging = new Tagging();
            $tagging->audit_id = $data->audit_id;
            $tagging->scene_type = $data->scene_type;
            $tagging->probe_id = $data->probe_id;
            $tagging->qat_id = $data->qat_id;
            $tagging->tagged_count = $data->tagged_count;
            $tagging->price_tags_count = $data->price_tags_count;
            $tagging->not_tagged_in_masking_area = $data->not_tagged_in_masking_area;
            $tagging->extra_tags = $data->extra_tags;
            $tagging->missed_sku_tags_by_qat = $data->missed_sku_tags_by_qat;
            $tagging->missed_empty_tags = $data->missed_empty_tags;
            $tagging->comment = $data->comment;
            $tagging->save();

            $imageFlawStatus = strtolower($data->image_flaw_status);

            if ($imageFlawStatus = 'accurate'){
                $imageFlawData['image_flaw_status'] = 1;
            }else{
                $imageFlawData['image_flaw_status'] = 0;
            }

            if (isset($data->marked_flaw_1)){

                $marked_flaw_1 = ImageFlaw::where('slug', strtolower(preg_replace("/[^a-zA-Z]/", "", $data->marked_flaw_1)))->first()->id;

                $imageFlawData['marked_flaw_1'] = $marked_flaw_1;
            }else{
                $imageFlawData['marked_flaw_1'] = 0;
            }

            if (isset($data->marked_flaw_2)){

                $marked_flaw_2 = ImageFlaw::where('slug', strtolower(preg_replace("/[^a-zA-Z]/", "", $data->marked_flaw_2)))->first()->id;

                $imageFlawData['marked_flaw_2'] = $marked_flaw_2;
            }else{
                $imageFlawData['marked_flaw_2'] = 0;
            }

            if (isset($data->correct_flaw_1)){

                $correct_flaw_1 = ImageFlaw::where('slug', strtolower(preg_replace("/[^a-zA-Z]/", "", $data->correct_flaw_1)))->first()->id;

                $imageFlawData['correct_flaw_1'] = $correct_flaw_1;
            }else{
                $imageFlawData['correct_flaw_1'] = 0;
            }

            if (isset($data->correct_flaw_2)){

                $correct_flaw_2 = ImageFlaw::where('slug', strtolower(preg_replace("/[^a-zA-Z]/", "", $data->correct_flaw_2)))->first()->id;

                $imageFlawData['correct_flaw_2'] = $correct_flaw_2;
            }else{
                $imageFlawData['correct_flaw_2'] = 0;
            }

            $imageFlawValue = new ImageFlawData();
            $imageFlawValue->audit_id = $data->audit_id;
            $imageFlawValue->image_flaw_status = $imageFlawData['image_flaw_status'];
            $imageFlawValue->marked_flaw_1 = $imageFlawData['marked_flaw_1'];
            $imageFlawValue->marked_flaw_2 = $imageFlawData['marked_flaw_2'];
            $imageFlawValue->correct_flaw_1 = $imageFlawData['correct_flaw_1'];
            $imageFlawValue->correct_flaw_2 = $imageFlawData['correct_flaw_2'];
            $imageFlawValue->save();

            $errorTypeData = new ErrorTypeData();
            $errorTypeData->audit_id = $data->audit_id;
            $errorTypeData->facings = $data->facings;
            $errorTypeData->dvc = $data->dvc;
            $errorTypeData->sku_size = $data->sku_size;
            $errorTypeData->sku_flavor = $data->sku_flavor;
            $errorTypeData->brand_when_sku_available = $data->brand_when_sku_available;
            $errorTypeData->sku_when_brand_other_should_tagged = $data->sku_when_brand_other_should_tagged;
            $errorTypeData->cat_when_sku_available = $data->cat_when_sku_available;
            $errorTypeData->sku_when_category_other_should_tagged = $data->sku_when_category_other_should_tagged;
            $errorTypeData->incorrect_category = $data->incorrect_category;
            $errorTypeData->brand_when_category_other_should_tagged = $data->brand_when_category_other_should_tagged;
            $errorTypeData->incorrect_brand = $data->incorrect_brand;
            $errorTypeData->cat_when_brand_available = $data->cat_when_brand_available;
            $errorTypeData->incorrect_sku_form = $data->incorrect_sku_form;
            $errorTypeData->incorrect_engine = $data->incorrect_engine;
            $errorTypeData->save();

            $responsibilityData = new ResponsibilityData();
            $responsibilityData->audit_id =  $data->audit_id;
            $responsibilityData->qat_negligence = $data->qat_negligence;
            $responsibilityData->qat_similar_looking_sku = $data->qat_similar_looking_sku;
            $responsibilityData->qat = $data->qat;
            $responsibilityData->engine = $data->engine;
            $responsibilityData->database_issue = $data->database_issue;
            $responsibilityData->probe_quality_issue = $data->probe_quality_issue;
            $responsibilityData->new_sku_addition = $data->new_sku_addition;
            $responsibilityData->sku_deactivation = $data->sku_deactivation;
            $responsibilityData->storage_method = $data->storage_method;
            $responsibilityData->other = $data->other;
            $responsibilityData->save();

            $posData = new PosData();
            $posData->audit_id = $data->audit_id;
            $posData->incorrect_pos = $data->incorrect_pos;
            $posData->pos_missing = $data->pos_missing;
            $posData->save();

            $pricingData = new PricingData();
            $pricingData->audit_id = $data->audit_id;
            $pricingData->incorrect_pricing = $data->incorrect_pricing;
            $pricingData->pricing_missing = $data->pricing_missing;
            $pricingData->save();

        }

        DailyEvaluation::where('audit_id', $id)->delete();

        return redirect()->route('audits.index');

    }
}
