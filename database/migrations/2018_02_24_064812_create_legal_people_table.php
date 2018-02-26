<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_people', function (Blueprint $table) {
            $table->integer('cnpj', 11);
            $table->string('social_reason');
            $table->string('fantasy_name');
            $table->string('cep', 8);
            $table->string('address');
            $table->integer('number');
            $table->string('complement')->nullable();
            $table->string('district');
            $table->string('city');
            $table->string('uf', 8);
            $table->integer('person_id')->unique();
            $table->foreign('person_id')
                ->references('id')->on('people')
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
        Schema::dropIfExists('legal_people');
    }
}
