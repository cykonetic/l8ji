<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramActivtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_sequences', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('activity_id');

            $table->timestamps();
            // we can create the field but the model doesn't support it
            $table->softDeletes();

            $table->index(['program_id', 'activity_id']);

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
