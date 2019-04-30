<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQatShortfallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qat_shortfalls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('gssc_shortfall')->default(null);
            $table->integer('gssk_shortfall')->default(null);
            $table->integer('igs_shortfall')->default(null);
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
        Schema::dropIfExists('qat_shortfalls');
    }
}
