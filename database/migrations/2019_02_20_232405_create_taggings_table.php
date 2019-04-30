<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaggingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taggings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id');
            $table->string('scene_type');
            $table->string('probe_id');
            $table->string('qat_id');
            $table->integer('tagged_count');
            $table->integer('price_tags_count');
            $table->integer('not_tagged_in_masking_area');
            $table->integer('extra_tags');
            $table->integer('missed_sku_tags_by_qat');
            $table->integer('missed_empty_tags');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('taggings');
    }
}
