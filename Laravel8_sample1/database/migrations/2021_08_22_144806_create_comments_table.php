<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            //$table->morphs('commentable')   //Hace lo mismo que las dos lineas anteriores
            $table->unsignedBigInteger('user_id');      // NOT "unique" because of 1:m relation
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            //$table->primary(['commentable_id', 'commentable_type']);  //  NOT primaries because 1:m relation
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
        Schema::dropIfExists('comments');
    }
}
