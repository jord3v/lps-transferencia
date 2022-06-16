
@extends('adminlte::page')
@section('title', 'AdminLTE')
@section('content_header')
    <h1 class="m-0 text-dark">Página inicial</h1>
@stop
@section('content') <div class="row">
   <div class="col-md-12">
      @include('layouts.flash-message')
   </div>
</div>
<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>{{$landingPages}}</h3>
        <p>Landing pages</p>
      </div>
      <div class="icon">
        <i class="fas fa-laptop"></i>
      </div>
      <a href="{{route('landing-pages.index')}}" class="small-box-footer">Mais detalhes <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
@stop
