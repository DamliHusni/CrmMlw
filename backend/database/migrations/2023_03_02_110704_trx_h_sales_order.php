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
        Schema::create('soh', function (Blueprint $table) {
            $table->id();
            $table->string('invoice', 16)->unique();
            $table->integer('customer_id');
            $table->date('date');
            $table->timestamps();
            $table->index(['id', 'invoice', 'customer_id', 'date']);
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soh');
    }
};
