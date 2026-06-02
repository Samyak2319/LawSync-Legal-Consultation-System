<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lawyers', function (Blueprint $table) {

            // REMOVE OLD FEE COLUMN
            $table->dropColumn('fee');

            // NEW FIELDS
            $table->string('profile_picture')->nullable();

            $table->string('bar_registration_number')->nullable();

            $table->string('qualification')->nullable();

            $table->text('chamber_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lawyers', function (Blueprint $table) {
            //
        });
    }
};
