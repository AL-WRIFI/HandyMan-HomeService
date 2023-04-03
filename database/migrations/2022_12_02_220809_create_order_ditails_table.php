<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_ditails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders','id')->cascadeOnDelete();
            $table->foreignId('service_id')->nullable()->constrained('services','id')->nullOnDelete();
            $table->integer('service_cost')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('total_cost')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_ditails');
    }
};
