<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id');
            $table->string('scene_type')->nullable();
            $table->integer('probe_id');
            $table->string('qat_id');
            $table->integer('project_id');
            $table->integer('tagged_count');
            $table->integer('price_tags_count')->default(0);
            $table->integer('not_tagged_in_masking_area')->default(0);
            $table->string('image_flaw_status');
            $table->string('marked_flaw_1')->nullable();
            $table->string('marked_flaw_2')->nullable();
            $table->string('correct_flaw_1')->nullable();
            $table->string('correct_flaw_2')->nullable();
            $table->integer('extra_tags')->default(0);
            $table->integer('missed_sku_tags_by_qat')->default(0);
            $table->integer('missed_empty_tags')->default(0);
            $table->integer('facings')->default(0);
            $table->integer('dvc')->default(0);
            $table->integer('sku_size')->default(0);
            $table->integer('sku_flavor')->default(0);
            $table->integer('brand_when_sku_available')->default(0);
            $table->integer('sku_when_brand_other_should_tagged')->default(0);
            $table->integer('cat_when_sku_available')->default(0);
            $table->integer('sku_when_category_other_should_tagged')->default(0);
            $table->integer('incorrect_category')->default(0);
            $table->integer('brand_when_category_other_should_tagged')->default(0);
            $table->integer('incorrect_brand')->default(0);
            $table->integer('cat_when_brand_available')->default(0);
            $table->integer('incorrect_sku_form')->default(0);
            $table->integer('incorrect_engine')->default(0);
            $table->integer('incorrect_pos')->default(0);
            $table->integer('pos_missing')->default(0);
            $table->integer('incorrect_pricing')->default(0);
            $table->integer('pricing_missing')->default(0);
            $table->integer('qat_negligence')->default(0);
            $table->integer('qat_similar_looking_sku')->default(0);
            $table->integer('qat')->default(0);
            $table->integer('engine')->default(0);
            $table->integer('database_issue')->default(0);
            $table->integer('probe_quality_issue')->default(0);
            $table->integer('new_sku_addition')->default(0);
            $table->integer('storage_method')->default(0);
            $table->integer('sku_deactivation')->default(0);
            $table->integer('other')->default(0);
            $table->text('comment')->nullable();
            $table->integer('user_id'); //auditor
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_evaluations');
    }
}
