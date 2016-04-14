<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{
  public function up(){
    Schema::create('weights', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
    });
    DB::table('weights')->insert(array(
      array('name' => '>100 t'),
      array('name' => '50 - 100 t'),
      array('name' => '20 - 50 t'),
      array('name' => '<20 t')
    ));
  }

  public function down(){
    Schema::drop('weights');
  }
}
