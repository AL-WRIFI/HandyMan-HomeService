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
        Schema::create('handyman', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); 
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->foreignId('city_id')->nullable()->constrained('cities','id')->nullOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained('zones','id')->nullOnDelete();
            $table->text('address_note')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('categories', 'id')->nullOnDelete();
            $table->string('description')->nullable();
            $table->json('working_days')->nullable();
            $table->string('identity_type')->nullable();
            $table->integer('identity_Number')->nullable();
            $table->string('identification_Image')->nullable();
            $table->integer('order_count')->default(0);
            $table->integer('rating_count')->unsigned()->default(0);
            $table->decimal('avg_rating',2,1)->default(0);
            $table->boolean('status')->default(1);
            $table->boolean('featured')->nullable()->default(0);
            $table->boolean('accepted')->default(1);
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
        Schema::dropIfExists('handyman');
    }
};
