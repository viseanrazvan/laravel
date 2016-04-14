@extends('layout')

@section('content')
  <h1>Aici vine lista cu masini</h1>
    <div>
      {{$theCar->model}}
    </div>
@stop