<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeoalmarTagsTable
{

    public function up()
    {
        Schema::create('leoalmar_tags', function(Blueprint $table){

            $table->increments('id');

            $table->string('name');

            $table->integer('taggable_id')->nullable()->unsigned()->index();
            $table->string('taggable_type')->nullable()->index();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('leoalmar_tags');
    }
}