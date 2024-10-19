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
            
            $table->string('col1')->default(false);
            $table->integer('col2')->default(false);
            $table->string('col3')->default(false);
            $table->integer('col4')->default(false);
            $table->string('col5')->default(false);
            $table->integer('col6')->default(false);
            $table->string('col7')->default(false);
            $table->integer('col8')->default(false);
            $table->string('col9')->default(false);
            $table->integer('col10')->default(false);
            $table->string('col11')->default(false);
            $table->integer('col12')->default(false);
            $table->string('col13')->default(false);
            $table->integer('col14')->default(false);
            $table->string('col15')->default(false);
            $table->integer('col16')->default(false);
            $table->string('col17')->default(false);
            $table->integer('col18')->default(false);
            $table->string('col19')->default(false);
            
            
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
