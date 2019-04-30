<?php

namespace App\Imports;

use App\DailyEvaluation;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DailyEvaluationsImport implements ToModel, WithChunkReading, ShouldQueue, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {


        return new DailyEvaluation([
            'audit_id' => DB::table('audits')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first()->id,
            'scene_type' => $row['scene_type'],
            'probe_id' => $row['probe_id'],
            'qat_id' => strtolower(preg_replace("/[^a-zA-Z0-9]/", "",$row['qat_id'])),
            'project_id' => 2,
            'tagged_count' => $row['tagged_count'],
            'price_tags_count' => $row['price_tag_count'],
            'not_tagged_in_masking_area' => $row['not_tagged_in_masking_area'],
            'image_flaw_status' => $row['image_flaw_status'],
            'marked_flaw_1' => $row['marked_flaw_1'],
            'marked_flaw_2' => $row['marked_flaw_2'],
            'correct_flaw_1' => $row['correct_flaw_1'],
            'correct_flaw_2' => $row['correct_flaw_2'],
            'extra_tags' => $row['extra_tagging'],
            'missed_sku_tags_by_qat' => $row['missed_sku_tagging_how_many_skus_missed_to_tag_excluding_empty'],
            'missed_empty_tags' => $row['missed_empty_tags'],
            'facings' => $row['facings_incorrect_recognition_of_facing'],
            'dvc' => $row['dvc_dvcs_not_recognized'],
            'sku_size' => $row['sku_confusion_sizes'],
            'sku_flavor' => $row['sku_confusion_sku_flavor'],
            'brand_when_sku_available' => $row['sku_confusion_brand_tagged_when_sku_available'],
            'sku_when_brand_other_should_tagged' => $row['sku_when_brand_other_should_tagged'],
            'cat_when_sku_available' => $row['sku_confusion_category_tagged_when_sku_available'],
            'sku_when_category_other_should_tagged' => $row['sku_when_category_other_should_tagged'],
            'incorrect_category' => $row['category_confusions_error_occurred_due_to_confusion_with_category_or_category_boundaries'],
            'brand_when_category_other_should_tagged' => $row['brand_when_category_other_should_tagged'],
            'incorrect_brand' => $row['brand_confusions_incorrect_brand'],
            'cat_when_brand_available' => $row['brand_confusions_category_selected_when_the_brand_is_available'],
            'incorrect_sku_form' => $row['incorrect_sku_form'],
            'incorrect_engine' => $row['incorrect_engine_tags'],
            'incorrect_pos' => $row['incorrect_pos_tagging'],
            'pos_missing' => $row['pos_missing'],
            'incorrect_pricing' => $row['incorrect_pricing'],
            'pricing_missing' => $row['pricing_missing'],
            'qat_negligence' => $row['qat_negligence'],
            'qat_similar_looking_sku' => $row['qat_similar_looking_sku'],
            'qat' => $row['qat'],
            'incorrect_engine_tags' => $row['engine'],
            'database_issue' => $row['database_issues'],
            'probe_quality_issue' => $row['probe_quality_issue'],
            'new_sku_addition' => $row['new_sku_addition'],
            'storage_method' => $row['storage_method'],
            'sku_deactivation' => $row['sku_deactivation'],
            'other' => $row['others'],
            'comment' => $row['comments'],
            'user_id' => Auth::user()->id,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
