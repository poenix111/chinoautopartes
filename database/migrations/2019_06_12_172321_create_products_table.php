<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre', 200)->unique();
            $table->integer('año')->unsigned();
            $table->float('precio');
            $table->boolean('nuevo');
            $table->boolean('garantia');
            $table->tinyInteger('cantDias');
            $table->string('imagen');
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_modelo')->unsigned();
            $table->integer('id_marca')->unsigned();
            $table->string('slug');

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
