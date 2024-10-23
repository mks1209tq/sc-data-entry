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
        Schema::table('certs', function (Blueprint $table) {
            
            $table->string('col1')->default(false)->nullable(); 
            $table->integer('col2')->default(false)->nullable();
            $table->string('col3')->default(false)->nullable();
            $table->integer('col4')->default(false)->nullable();
            $table->string('col5')->default(false)->nullable();
            $table->integer('col6')->default(false)->nullable();
            $table->string('col7')->default(false)->nullable();
            $table->integer('col8')->default(false)->nullable();
            $table->string('col9')->default(false)->nullable();
            $table->integer('col10')->default(false)->nullable();
            $table->string('col11')->default(false)->nullable();
            $table->integer('col12')->default(false)->nullable();
            $table->string('col13')->default(false)->nullable();
            $table->integer('col14')->default(false)->nullable();
            $table->string('col15')->default(false)->nullable();
            $table->integer('col16')->default(false)->nullable();
            $table->string('col17')->default(false)->nullable();
            $table->integer('col18')->default(false)->nullable();
            $table->string('col19')->default(false)->nullable();
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certs', function (Blueprint $table) {
            //
        });
    }
};
