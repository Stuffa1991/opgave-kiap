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
        Schema::create('patient_vaerdier', function (Blueprint $table) {
            $table->id();
            $table->boolean("slettet");
            $table->string("ydernummer");
            $table->date("dato");
            $table->integer("standard_vaerdi");
            $table->integer("praksis_vaerdi");
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
        Schema::dropIfExists('patient_vaerdier');
    }
};
