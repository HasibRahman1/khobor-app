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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('company_name');
            $table->text('title')->nullable();
            $table->text('slogan')->nullable();
            $table->text('company_description')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->text('website_link')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('linkdln_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('tiktok_link')->nullable();
            $table->text('other_link')->nullable();
            $table->text('other_link2')->nullable();
            $table->text('other_link3')->nullable();
            $table->text('company_address')->nullable();
            $table->text('google_map_api_link')->nullable();
            $table->text('logo_jpg')->nullable();
            $table->text('logo_png')->nullable();
            $table->text('favicon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
