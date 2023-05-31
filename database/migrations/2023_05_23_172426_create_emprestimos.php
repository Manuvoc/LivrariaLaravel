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
    { Schema::disableForeignKeyConstraints();

        Schema::create('emprestimo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livros_id')->nullable()->constrained('livros')->default(null);
            $table->date('dataretirada');
            $table->date('datadevolucao');
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
        Schema::dropIfExists('emprestimo');
    }
};
