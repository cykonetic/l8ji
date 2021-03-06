<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityKeywordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_keyword', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id')->index();
            $table->unsignedBigInteger('keyword_id');
            $table->timestamps();

            $table->unique(['keyword_id', 'activity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_keyword');
    }
}
