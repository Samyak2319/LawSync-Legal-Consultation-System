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
        Schema::create('case_histories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lawyer_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('case_description');

            $table->date('filing_date')->nullable();

            $table->date('registration_date')->nullable();

            $table->date('hearing_date')->nullable();

            $table->enum('status', [
                'Pending',
                'Running',
                'Closed'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_histories');
    }
};