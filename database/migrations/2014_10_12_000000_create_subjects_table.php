<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->year('year');
            $table->string('description');
            $table->string('teacher');
            $table->foreignId('group_id')
                ->constrained('groups')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * }    *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
