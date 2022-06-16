@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
   <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0">Configurações</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item active">Configurações</li>
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
    <div class="alert alert-primary alert-dismissible">
        <h5><i class="icon fas fa-info"></i> Sobre</h5>
        As configurações abaixo, são relacionados a criação de virtuais hosts a cada landing page gerada.
      </div>
      <div class="card card-default">
         <div class="card-header">
            <h3 class="card-title">Configurações </h3>
         </div>
         <form role="form" action="{{route('settings.update', 1)}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="card-body">
               <div class="form-row mb-3">
                  <div class="col-12 col-md-4">
                     <label>ServerAdmin</label>
                     <input type="text" name="ServerAdmin" class="form-control" value="{{$settings->ServerAdmin}}"  placeholder="admin@test.com" required>
                     <div class="invalid-feedback">
                        Por favor, informe o ServerAdmin
                     </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <label>ErrorLog</label>
                    <input type="text" name="ErrorLog" class="form-control" value="{{$settings->ErrorLog}}" placeholder="${APACHE_LOG_DIR}/error.log" required>
                    <div class="invalid-feedback">
                     Por favor, informe o arquivo de ErrorLog
                     </div>
                  </div>
                  <div class="col-12 col-md-4">
                    <label>CustomLog</label>
                    <input type="text" name="CustomLog" class="form-control" value="{{$settings->CustomLog}}" placeholder="${APACHE_LOG_DIR}/access.log combined" required>
                    <div class="invalid-feedback">
                     Por favor, informe o arquivo de CustomLog
                    </div>
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