<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  
  public function getAll(){
    return DB::table('cars')
      ->join('weights', 'weights.id', '=', 'cars.weight_id')
      ->join('categories', 'categories.id', '=', 'cars.category_id')
      ->select('cars.id', 'cars.model', 'cars.fabricationYear', 'cars.picture',
               'weights.name AS weightName', 'categories.name AS categoryName')
      ->get();
  }
  
  public function addCar($aCar){
    DB::table('cars')->insert(
      array(
        'model' => $aCar['model'],
        'category_id' => $aCar['category_id'],
        'weight_id' => $aCar['weight_id'],
        'fabricationYear' => $aCar['fabricationYear'] 
      )
    );
  }
  
  public function getAllByFilters($aFilters){
    $theFilterString = 'WHERE 1=1';
    if(isset($aFilters['categoryId'])){
      $theFilterString .= ' AND cat.id = '.$aFilters['categoryId'];
    }
    if(isset($aFilters['weightId'])){
      $theFilterString .= ' AND w.id = '.$aFilters['weightId'];
    }
    if(isset($aFilters['fabricationYear'])){
      $theFilterString .= ' AND c.fabricationYear = '.$aFilters['fabricationYear'];
    }
    if(isset($aFilters['model'])){
      $theFilterString .= " AND c.model LIKE '%".$aFilters['model']."%'";
    }
    return DB::select( DB::raw("
      SELECT c.id, c.model, c.fabricationYear, c.picture, w.name AS weightName, cat.name as categoryName
      FROM cars c 
      INNER JOIN weights w on w.id = c.weight_id
      INNER JOIN categories cat on cat.id = c.category_id
      ".$theFilterString
    ));
  }
}
