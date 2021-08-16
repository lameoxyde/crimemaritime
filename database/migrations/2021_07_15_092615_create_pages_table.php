<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('thematique_id')->index();
            $table->integer('numero');
            // $table->string('thematique', 50);
            $table->string('nom', 50);
            $table->date('date');
            $table->string('objet' ,50);
            $table->string('lieu', 50);
            $table->string('flag', 50);
            $table->string('latitude', 15);
            $table->string('longitude', 15);
            $table->string('description');
            $table->foreign('thematique_id')
            ->references('id')
            ->on('thematiques')
            ->onDelete('cascade');

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
        Schema::dropIfExists('pages');
    }
}
