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
        Schema::create('payment_runs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('country_id');
            $table->timestamp('stage_1')->nullable();
            $table->timestamp('stage_2')->nullable();
            $table->timestamp('stage_3')->nullable();
            $table->timestamp('stage_4')->nullable();
            $table->timestamp('stage_5')->nullable();
            $table->timestamp('stage_6')->nullable();
            $table->string('status')->nullable();
            $table->boolean('visible_to_client')->default(false);
            $table->boolean('visible_to_subby')->default(false);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('country_id')->references('id')->on('countries');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_runs');
    }
};
