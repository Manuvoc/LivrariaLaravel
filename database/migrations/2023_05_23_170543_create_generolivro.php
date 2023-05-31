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
        Schema::create('generolivro', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();

        Schema::table('livros', function (Blueprint $table) {
            $table->foreignId('generolivro_id')->nullable()->constrained('generolivro')->default(null);
        });
        Schema::table('estoque', function (Blueprint $table) {
            $table->foreignId('generolivro_id')->nullable()->constrained('generolivro')->default(null);
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
        Schema::dropIfExists('generolivro');
    }
};
