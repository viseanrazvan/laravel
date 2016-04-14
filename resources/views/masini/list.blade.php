@extends('layout')

@section('content')
<div class="col-md-8 col-md-offset-2">
  <div class="panel panel-primary">
    <div class="panel-heading">Lista cu masini</div>
    <div class="panel-body">
      <div class="filters">
        <h4>Filtre</h4>
        <div class="form-group category">
          <label>Categorie</label>
          <select class="form-control" id="category">
            <option></option>
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group weight" style="display: none">
          <label>Greutate</label>
          <select class="form-control" id="weight">
            <option></option>
            @foreach($weights as $weight)
              <option value="{{$weight->id}}">{{$weight->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group fabricationYear" style="display: none">
          <label>An fabricatie</label>
          <input type="text" id="fabricationYear" class="form-control" />
        </div>
        <div class="form-group model" style="display: none">
          <label>Model</label>
          <input type="text" id="model" class="form-control" />
        </div>
      </div>
      <table class="table table-striped table-bordered table-responsive">
        <tr>
          <th>#</th>
          <th>An Fabricatie</th>
          <th>Model</th>
          <th>Categorie</th>
          <th>Greutate</th>
          <th>Poza</th>
        </tr>
        @for($i = 0; $i < count($cars); $i++)
          <tr>
            <td>{{$i+1}}</td>
            <td>{{$cars[$i]->fabricationYear}}</th>
            <td>{{$cars[$i]->model}}</th>
            <td>{{$cars[$i]->categoryName}}</th>
            <td>{{$cars[$i]->weightName}}</th>
            <td>{{$cars[$i]->picture}}</th>
          </tr>  
        @endfor
      </table>
    </div>
  </div>
  <br>
  <div class="panel panel-primary">
    <div class="panel-heading">Adauga masina</div>
    <div class="panel-body">
      <form class="form-horizontal" action="masini/addCar/">
        <div class="form-group">
          <label class="col-sm-3 control-label">Model</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="model">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">An fabricatie</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="fabricationYear">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Categorie</label>
          <div class="col-sm-9">
            <select class="form-control" name="category_id">
              <option></option>
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Greautate</label>
          <div class="col-sm-9">
            <select class="form-control" name="weight_id">
              <option></option>
              @foreach($weights as $weight)
                <option value="{{$weight->id}}">{{$weight->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <a id="addCarBtn" style="margin-left: 15px;" class="btn btn-primary">Adauga masina</a>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>  
@stop