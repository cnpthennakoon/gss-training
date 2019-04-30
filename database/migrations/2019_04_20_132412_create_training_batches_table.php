<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_batches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('training_project_status_id');
            $table->integer('training_center_id');
            $table->integer('training_batch_status_id');
            $table->integer('training_batch_type_id');
            $table->integer('training_nature_id');
            $table->date('start_date');
            $table->date('live_date');
            $table->integer('received_head_count');
            $table->integer('hr_attrition_count')->default(null);
            $table->integer('training_attrition_count')->default(null);
            $table->integer('first_exam_passed_count')->default(null);
            $table->integer('second_exam_passed_count')->default(null);
            $table->text('comment')->default(null);
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
        Schema::dropIfExists('training_batches');
    }
}
