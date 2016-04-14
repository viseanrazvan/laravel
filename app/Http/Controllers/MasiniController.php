<?php
namespace App\Http\Controllers;

use App\Car;
use App\Category;
use App\Weight;
use Illuminate\Http\Request;
use App\Http\Requests;

class MasiniController extends Controller
{
  public function index(){
    $theCar = new Car;
    $theCategory = new Category;
    $theWeight = new Weight;
    return view('masini.list', array(
      'cars' => $theCar->getAll(),
      'categories' => $theCategory->all(),
      'weights' => $theWeight->all(),
    ));
  }
  
  public function addCar(){
    $theInput = request()->all();
    $theCarData = array(
      'model' => $theInput['model'], 
      'category_id' => $theInput['category_id'], 
      'weight_id' => $theInput['weight_id'], 
      'fabricationYear' => $theInput['fabricationYear']
    );
    $theBool = $this->validateCar($theCarData);
    if($theBool){
      $theCar = new Car;
      $theCar->addCar($theCarData);
      return $this->createTable($theCar->getAll());
    } else {
      return "error";
    }
    
  }
  
  private function validateCar($aCar){
    $theAllCategories = (new Category)->get()->toArray();
    $theAllWeights = (new Weight)->get()->toArray();;
    $theBool = true;
    if(intval($aCar['fabricationYear']) <= 2001){
      $theBool = false;
      return $theBool;
    }
    $theTempBool = false;
    foreach($theAllCategories as $theCategory){
      if(in_array($aCar['category_id'], $theCategory)){
        $theTempBool = true;
        break;        
      }
    }
    if($theTempBool == false){
      return $theTempBool;
    }
    $theTempBool = false;
    foreach($theAllWeights as $theWeight){
      if(in_array($aCar['weight_id'], $theWeight)){
        $theTempBool = true;
        break;        
      }
    }
    if($theTempBool == false){
      return $theTempBool;
    }
    return $theBool;
  }
  
  public function getWithFilters(){
    $theInput = request()->all();
    $theFilters = array();
    foreach ($theInput as $theKey => $theValue) {
      if($theValue !== '' && $theValue !== 0){
        $theFilters[$theKey] = $theValue;
      }
    }
    
    $theCar = new Car;
    return $this->createTable($theCar->getAllByFilters($theFilters));
  }
  
  private function createTable($aCars){
    $theTable = '
      <table class="table table-striped table-bordered table-responsive">
        <tr>
          <th>#</th>
          <th>An Fabricatie</th>
          <th>Model</th>
          <th>Categorie</th>
          <th>Greutate</th>
          <th>Poza</th>
        </tr>';
    for($i = 0; $i < count($aCars); $i++){
      $theTable .= '
        <tr>
          <td>'.($i+1).'</td>
          <td>'.$aCars[$i]->fabricationYear.'</th>
          <td>'.$aCars[$i]->model.'</th>
          <td>'.$aCars[$i]->categoryName.'</th>
          <td>'.$aCars[$i]->weightName.'</th>
          <td>'.$aCars[$i]->picture.'</th>
        </tr>';  
    }
    $theTable .= '</table>';
    return $theTable;
      
  }
}
