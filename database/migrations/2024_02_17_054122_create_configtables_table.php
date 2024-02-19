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
        Schema::create('configtables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classid')->constrained(table: 'classes');
            $table->foreignId('sectionid')->constrained(table: 'sections');
            $table->string('daysinweek');
            $table->string('period');
            $table->string('starttime');
            $table->string('duration');
            $table->longText('break');
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configtables');
    }
};
