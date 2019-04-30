<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateErrorTypeDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_type_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id');
            $table->integer('facings');
            $table->integer('dvc');
            $table->integer('sku_size');
            $table->integer('sku_flavor');
            $table->integer('brand_when_sku_available');
            $table->integer('sku_when_brand_other_should_tagged');
            $table->integer('cat_when_sku_available');
            $table->integer('sku_when_category_other_should_tagged');
            $table->integer('incorrect_category');
            $table->integer('brand_when_category_other_should_tagged');
            $table->integer('incorrect_brand');
            $table->integer('cat_when_brand_available');
            $table->integer('incorrect_sku_form');
            $table->integer('incorrect_engine');
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
        Schema::dropIfExists('error_type_datas');
    }
}
