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
        Schema::create('handyman_zones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('handyman_id')->nullable()->constrained('handyman','id')->nullOnDelete();
            $table->foreignId('zone_id')->nullable()->constrained('zones','id')->nullOnDelete();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('handyman_zones');
    }
};
