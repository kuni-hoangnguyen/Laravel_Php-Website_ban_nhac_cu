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
        Schema::create('tbl_checkout', function (Blueprint $table) {
            $table->id('checkout_id');
            $table->unsignedBigInteger('user_id');
            $table->string('checkout_name');
            $table->string('checkout_address');
            $table->string('checkout_phone');
            $table->string('checkout_description')->nullable();;
            $table->float('checkout_total');
            $table->integer('checkout_status');
            $table->date('delivery_date')->nullable();
            $table->string('checkout_payment_method');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_checkout');
    }
};
