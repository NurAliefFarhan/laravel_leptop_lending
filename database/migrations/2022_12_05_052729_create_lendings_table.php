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
        Schema::create('lendings', function (Blueprint $table) {
            $table->id(); 
            $table->bigInteger('user_id');
            $table->integer('nis'); 
            $table->string('name'); 
            $table->string('region'); 
            $table->text('ket'); 
            $table->string('purposes'); 
            $table->date('date'); 
            $table->date('return_date')->nullable(); 
            $table->string('teacher'); 
            $table->boolean('status');
            $table->date('done_time')->nullable(); 
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
        Schema::dropIfExists('lendings');
    }
};
