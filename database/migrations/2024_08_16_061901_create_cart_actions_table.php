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
        Schema::create('cart_actions', function (Blueprint $table) {
            $table->id();
            $table->string('user_ip');
            $table->string('country')->nullable();
            $table->integer('product_id')->nullable()->default(0);
            $table->integer('deal_id')->nullable()->default(0);
            $table->string('action_type')->nullable();
            $table->string('action_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_actions');
    }
};
