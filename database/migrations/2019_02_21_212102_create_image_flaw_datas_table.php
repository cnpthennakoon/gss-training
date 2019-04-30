<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageFlawDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_flaw_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audit_id');
            $table->integer('image_flaw_status'); // 1 = accurate, 0 = inaccurate
            $table->integer('marked_flaw_1');
            $table->integer('marked_flaw_2');
            $table->integer('correct_flaw_1');
            $table->integer('correct_flaw_2');
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
        Schema::dropIfExists('image_flaw_datas');
    }
}
