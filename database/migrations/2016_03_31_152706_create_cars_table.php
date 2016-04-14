<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
  public function up() {
    Schema::create('cars', function (Blueprint $table) {
      $table->increments('id');
      $table->string('model');
      $table->integer('category_id')->unsigned()->index();
      $table->integer('weight_id')->unsigned()->index();
      $table->string('fabricationYear', 4);
      $table->string('picture', 4);
      $table->timestamps();
    });
    
    DB::table('cars')->insert(array(
      array('model' => 'Skoda', 'category_id'=>1, 'weight_id'=>1, 'fabricationYear'=>'2010'),
      array('model' => 'Dacia', 'category_id'=>2, 'weight_id'=>2, 'fabricationYear'=>'2011'),
      array('model' => 'Fiat', 'category_id'=>3, 'weight_id'=>3, 'fabricationYear'=>'2012'),
      array('model' => 'Volvo', 'category_id'=>3, 'weight_id'=>4, 'fabricationYear'=>'2013'),
    ));
  }
  public function down(){
    Schema::drop('cars');
  }
}
