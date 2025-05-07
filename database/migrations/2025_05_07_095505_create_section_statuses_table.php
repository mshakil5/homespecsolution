<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_statuses', function (Blueprint $table) {
            $table->id();
            $table->boolean('slider')->default(1); 
            $table->boolean('about')->default(1); 
            $table->boolean('projects')->default(1); 
            $table->boolean('services')->default(1); 
            $table->boolean('why_choose_us')->default(1); 
            $table->boolean('video_blog')->default(1); 
            $table->boolean('get_in_touch')->default(1); 
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
        Schema::dropIfExists('section_statuses');
    }
}
