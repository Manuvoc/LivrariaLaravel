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
        Schema::create('leitura', function (blueprint $table) {
            $table->id();
            $table->date('data_leitura');
            $table->time('hora_leitura');
            $table->float('valor_sensor');
            $table->foreignId('sensor_id')->nullable()->constrained('sensor')->default(null);
            $table->foreignId('mac_id')->nullable()->constrained('mac')->default(null);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::dropIfExists('leitura');

    }
};
