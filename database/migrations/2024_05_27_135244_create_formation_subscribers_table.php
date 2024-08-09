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
        Schema::create('formation_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('email')->nullable();
            $table->string('profession')->nullable();
            $table->longText('residence')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('education_level')->nullable();
            $table->string('last_institution')->nullable();
            $table->longText('professional_skills')->nullable();
            $table->longText('motivation')->nullable();
            $table->string("emergency_contact_name")->nullable();
            $table->string("emergency_contact_phone")->nullable();
            $table->string("emergency_contact_relationship")->nullable();
            $table->string("emergency_contact_address")->nullable();
            $table->string("social_disability")->nullable();
            $table->string("marital_status")->nullable();
            $table->string("number_of_children")->nullable();
            $table->boolean("has_children")->nullable();
            $table->longText('referral_source')->nullable();
            $table->longText('future_plans')->nullable();
            $table->foreignId('formation_id')->constrained()->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->string('agent_id')->nullable();
            $table->foreignId('pays_id')->constrained()->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->boolean("to_subscribe")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_subscribers');
    }
};
