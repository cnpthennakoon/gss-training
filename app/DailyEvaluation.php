<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyEvaluation extends Model
{
    //

    public $fillable = ['audit_id' ,'scene_type','probe_id','qat_id','project_id','tagged_count','price_tags_count','not_tagged_in_masking_area','image_flaw_status','marked_flaw_1','marked_flaw_2','correct_flaw_1','correct_flaw_2','extra_tags','missed_sku_tags_by_qat', 'missed_empty_tags', 'missed_empty_tags','facings','dvc','sku_size','sku_flavor','brand_when_sku_available', 'sku_when_brand_other_should_tagged','cat_when_sku_available', 'sku_when_category_other_should_tagged','incorrect_category', 'brand_when_category_other_should_tagged','incorrect_brand','cat_when_brand_available', 'incorrect_sku_form','incorrect_engine','incorrect_pos','pos_missing','incorrect_pricing','pricing_missing','qat_negligence','qat_similar_looking_sku','qat,engine','database_issue','probe_quality_issue','new_sku_addition','storage_method','sku_deactivation','other','comment','user_id'];


}

