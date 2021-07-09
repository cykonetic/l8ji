<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_user', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->index();
            $table->unsignedBigInteger('user_id');
            $table->boolean('master')->default(false);
            // view users
            // view activities
            $table->boolean('host_video')->default(false);

            $table->timestamps();

            $table->index(['user_id', 'course_id', 'master']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_user');
    }
}
