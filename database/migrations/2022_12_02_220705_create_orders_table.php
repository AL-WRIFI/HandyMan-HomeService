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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->foreignId('handyman_id')->nullable()->constrained('handyman', 'id')->nullOnDelete();  
            $table->text('note')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities','id')->nullOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained('zones','id')->nullOnDelete();
            $table->text('address_note')->nullable();
            $table->timestamp('dateTimeService')->nullable();
            $table->enum('status',['pending','accepted','ongoing','completed','rejected'])->default('pending');
            $table->integer('total_cost')->default(0);
            $table->enum('orderType', ['all', 'handyman'])->default('all');
            //$table->string("payment_method");
            //$table->bigInteger('payment_id')->unsigned();
            //$table->foreign('payment_id')->references('id')->on('payments')->onDelete('set null')->onUpdate('set null');
            //$table->foreign('orders_status_id')->references('id')->on('orders_status')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('orders');
    }
};
