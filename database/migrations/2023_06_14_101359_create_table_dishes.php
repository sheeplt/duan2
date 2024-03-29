<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); //category's id
            $table->string('ca_name');//category's name
            $table->longText('ca_descri');
            $table->timestamps();
        });

        Schema::create('dishes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->text('descri');
            $table->timestamps();
            // add foreign key
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('cascade');
                    //->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_dishes');
    }
};
