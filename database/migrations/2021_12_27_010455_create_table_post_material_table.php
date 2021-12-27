<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePostMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_material', function (Blueprint $table) {
            $table->integer('material_name')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->integer('amount')->default(0);

            $table->primary(['material_name', 'post_id']);
            $table->foreign('material_name')->references('material_name')->on('material')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_material');
    }
}
