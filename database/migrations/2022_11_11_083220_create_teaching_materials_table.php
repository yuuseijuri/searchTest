<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachingMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching_materials', function (Blueprint $table) {
            $table->increments('id')->comment('教材ID');
            $table->string('name')->comment('教材名');
            $table->unsignedInteger('medium_id');
            $table->unsignedInteger('category_id');
            //外部キー制約の設定
            $table->foreign('medium_id')->references('id')->on('media')->comment('媒体ID');
            $table->foreign('category_id')->references('id')->on('categories')->comment('コンテンツID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teaching_materials');
    }
}
