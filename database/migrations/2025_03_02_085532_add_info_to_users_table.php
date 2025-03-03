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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('full_name')->nullable( );
            $table->string('phone')->nullable( );
            $table->string('role')->default('admin')->comment('admin, doctor, patient');
            $table->text('address')->nullable( );
            $table->string('dob')->nullable( );
            $table->string('specialization')->nullable( );
            $table->text('experience')->nullable( );
            $table->text('bio')->nullable( );
            $table->string('photo')->nullable( );
            $table->string('license_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
