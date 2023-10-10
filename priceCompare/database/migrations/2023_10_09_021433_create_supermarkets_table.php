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
        Schema::create('supermarkets', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("introduction");
            $table->integer("shop_no");
            $table->string("city");
            $table->longText("address");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supermarkets');
    }
};
