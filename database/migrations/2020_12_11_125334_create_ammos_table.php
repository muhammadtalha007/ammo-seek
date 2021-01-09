<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmmosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ammos', function (Blueprint $table) {
            $table->id();
            $table->string('ammo_type')->nullable();
            $table->string('gauge')->nullable();
            $table->string('shot_type')->nullable();
            $table->string('shell_length')->nullable();
            $table->string('retailer')->nullable();
            $table->string('caliber')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('mfg')->nullable();
            $table->string('description')->nullable();
            $table->string('condition')->nullable();
            $table->string('case_material')->nullable();
            $table->string('shipping')->nullable();
            $table->string('rounds')->nullable();
            $table->string('grain_weight')->nullable();
            $table->string('ammo_external_link')->nullable();
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
        Schema::dropIfExists('ammos');
    }
}
