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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('container_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('style_no');
            $table->string('uom');
            $table->string('prefix');
            $table->string('suffix');
            $table->string('height');
            $table->string('width');
            $table->string('length');
            $table->string('weight');
            $table->string('upc');
            $table->string('size1');
            $table->string('color1');
            $table->string('size2')->nullable();
            $table->string('color2')->nullable();
            $table->string('size3')->nullable();
            $table->string('color3')->nullable();
            $table->string('carton');
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
        Schema::dropIfExists('packages');
    }
};
