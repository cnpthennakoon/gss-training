<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttritionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attritions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_batch_id');
            $table->string('qat_id');
//            $table->integer('training_center_id');
//            $table->integer('project_id');
//            $table->date('training_started_at');
            $table->date('last_working_date');
            $table->integer('attrition_type_id');
            $table->integer('attrition_reason_id');
            $table->string('comment')->default(null);
            $table->integer('user_id');
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
        Schema::dropIfExists('attritions');
    }
}
