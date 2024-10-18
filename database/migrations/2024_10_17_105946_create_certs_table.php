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
        Schema::create('certs', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->string('project_id');
            $table->string('order_id');
            $table->string('pc_id');
            $table->string('latest_pc_id');
            $table->string('advance_amount')->nullable();
            $table->string('retention_amount')->nullable();
            $table->string('deduction_amount')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certs');
    }
};