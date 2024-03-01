<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id')->nullable();
            $table->integer('reporter_id');
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description');
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->string('browse_video')->nullable();
            $table->text('video_link')->nullable();
            $table->text('converted_video_link')->nullable();
            $table->tinyInteger('main_status')->default(0);
            $table->tinyInteger('top_status')->default(0);
            $table->tinyInteger('popular_status')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->dateTime('publish_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
