<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_program', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('activity_id');
            $table->unsignedSmallInteger('sequence')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['program_id', 'activity_id', 'sequence'], 'sequenceable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_program');
    }
}
