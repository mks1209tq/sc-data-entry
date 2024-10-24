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
            
            $table->integer('col20')->default(false)->nullable();   
            $table->string('col21')->default(false)->nullable();
            $table->integer('col22')->default(false)->nullable();
            $table->string('col23')->default(false)->nullable();
            $table->integer('col24')->default(false)->nullable();
            $table->string('col25')->default(false)->nullable();
            $table->integer('col26')->default(false)->nullable();
            $table->string('col27')->default(false)->nullable();
            $table->integer('col28')->default(false)->nullable();
            $table->string('col29')->default(false)->nullable();
            $table->integer('col30')->default(false)->nullable();
           
            
            
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
