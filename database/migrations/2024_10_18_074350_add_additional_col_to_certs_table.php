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
            
            $table->integer('col20')->default(false);
            $table->string('col21')->default(false);
            $table->integer('col22')->default(false);
            $table->string('col23')->default(false);
            $table->integer('col24')->default(false);
            $table->string('col25')->default(false);
            $table->integer('col26')->default(false);
            $table->string('col27')->default(false);
            $table->integer('col28')->default(false);
            $table->string('col29')->default(false);
            $table->integer('col30')->default(false);
           
            
            
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
