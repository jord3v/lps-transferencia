@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
   <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0">Cadastrar nova</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('landing-pages.index')}}">Landing pages</a></li>
            <li class="breadcrumb-item active">Cadastrar nova</li>
         </ol>
      </div>
   </div>
   <div class="row mb-2">
      <div class="col-md-12">
         <div class="btn-group float-right">
            <a class="btn btn-outline-primary btn-flat" href="{{route('landing-pages.index')}}"><i class="fas fa-arrow-left"></i> Voltar</a>
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
            <h3 class="card-title">Cadastrar nova landing page</h3>
         </div>
         <form role="form" action="{{route('landing-pages.store')}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="card-body">
               <div class="form-row mb-3">
                  <div class="col-12 col-md-4">
                     <label>Nome da landing page</label>
                     <input type="text" name="title" class="form-control" placeholder="University transfer 2021/2" required>
                     <div class="invalid-feedback">
                        Por favor, informe o nome da landing page
                     </div>
                  </div>
                  <div class="col-12 col-md-4">
                     <label>Subdomínio</label>
                     <input type="text" name="domain" class="form-control" placeholder="foo.website.com.br" required>
                     <div class="invalid-feedback">
                        Por favor, informe o domínio
                     </div>
                  </div>
                  <div class="col-12 col-md-4">
                     <label>Arquivo</label>
                     
                     <div class="custom-file">
                        <input id="file" name="file" type="file" class="custom-file-input" accept=".zip,.rar,.7zip" required>
                        <label for="file" class="custom-file-label text-truncate">Escolher arquivo ZIP</label>
                        <div class="invalid-feedback">
                           Por favor, insira o arquivo no formato ZIP
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-outline-success float-right">Criar landing page</button>
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
$('.custom-file-input').on('change', function() { 
   let fileName = $(this).val().split('\\').pop(); 
   $(this).next('.custom-file-label').addClass("selected").html(fileName); 
});
</script>
@stop