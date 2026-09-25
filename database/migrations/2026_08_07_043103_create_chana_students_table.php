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
        Schema::create('chanathip_students', function (Blueprint $table) {
            $table->id();
            
            // 5 คอลัมน์ตามโจทย์
            $table->integer('age')->nullable();
            $table->float('weight')->nullable();
            $table->string('note')->nullable();
            $table->date('date')->nullable();
            $table->text('remark')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chanathip_students');
    }
};