<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFisicalPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisical_people', function (Blueprint $table) {
            $table->integer('cpf', 11);
            $table->string('name');
            $table->string('last_name', 15);
            $table->datetime('birthday');
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
        Schema::dropIfExists('fisical_people');
    }
}
