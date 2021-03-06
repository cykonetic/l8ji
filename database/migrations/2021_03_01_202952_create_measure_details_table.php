<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measure_details', function (Blueprint $table) {
            $table->unsignedBigInteger('measure_id');

            $table->string('class_name');
            $table->float('min_score');
            $table->float('max_score');

            $table->timestamps();
            $table->softDeletes();

            $table->primary('measure_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measure_details');
    }
}
