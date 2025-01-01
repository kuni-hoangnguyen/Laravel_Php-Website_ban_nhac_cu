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
        Schema::create('tbl_info', function (Blueprint $table) {
            $table->id('info_id');
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('minimap', 1024)->nullable();
			$table->string('work_time')->nullable();
			$table->string('email')->nullable();
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_info');
    }
};
