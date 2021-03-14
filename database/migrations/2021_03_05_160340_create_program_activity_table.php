<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_activity', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('activity_id');
            $table->unsignedSmallInteger('sequence')->nullable();

            $table->timestamps();
            // we can create the field but the model doesn't support it
            $table->softDeletes();

            $table->index(['program_id', 'activity_id'], 'sequenceable');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_activity');
    }
}