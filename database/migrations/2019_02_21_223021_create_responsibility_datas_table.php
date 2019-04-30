<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsibilityDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsibility_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id');
            $table->integer('qat_negligence');
            $table->integer('qat_similar_looking_sku');
            $table->integer('qat');
            $table->integer('engine');
            $table->integer('database_issue');
            $table->integer('probe_quality_issue');
            $table->integer('new_sku_addition');
            $table->integer('sku_deactivation');
            $table->integer('storage_method');
            $table->integer('other');
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
        Schema::dropIfExists('responsibility_datas');
    }
}
