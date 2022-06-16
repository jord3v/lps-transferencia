@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
   <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0">Meu perfil</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item active">Meu perfil</li>
         </ol>
      </div>
   </div>
   <div class="row mb-2">
      <div class="col-md-12">
         <div class="btn-group float-right">
            <a class="btn btn-outline-primary btn-flat" href="{{route('dashboard')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
         </div>
      </div>
   </div>
</div>
@stop
@section('content') <div class="row">
   <div class="col-md-12">
      @include('layouts.flash-message')
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">Meu perfil </h3>
         </div>
         <form role="form" action="{{route('profile.update')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="card-body">
               <div class="form-row mb-3">
                  <div class="col-3">
                     <label>Nome</label>
                     <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                  </div>
                  <div class="col-3">
                     <label>E-mail</label>
                     <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                  </div>
                  <div class="col-3">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <div class="col-3">
                     <label>Senha</label>
                     <input type="password" name="confirm-password" class="form-control">
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-outline-success float-right">Atualizar</button>
            </div>
         </form>
      </div>
   </div>
</div>
@stop
@section('css')
@stop
@section('js')
<script>

</script>
@stop