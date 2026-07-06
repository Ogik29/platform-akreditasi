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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('supervisor'); // MDB, FZK, MUN, YOH, CAP
            $table->enum('type', ['web', 'mobile', 'hardware']);
            $table->string('logo')->nullable();
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->json('features')->nullable(); // array of features
            $table->json('funding_awards')->nullable(); // array of awards/funding
            $table->enum('tech_field', ['AI', 'Networking & Cyber Security', 'IoT', 'VR/AR', 'Others'])->default('Others');
            $table->enum('prestasi_level', ['nasional', 'internasional'])->default('nasional'); // nasional, internasional
            $table->json('partners')->nullable(); // array of partners
            $table->json('logo_mitra')->nullable(); // array of partner logos/photos
            $table->json('team_members')->nullable(); // array of members
            $table->text('external_url')->nullable(); // for web
            $table->string('video_url')->nullable(); // for hardware
            $table->json('screenshots')->nullable(); // for mobile
            $table->json('documentations')->nullable(); // for documentation photos
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
