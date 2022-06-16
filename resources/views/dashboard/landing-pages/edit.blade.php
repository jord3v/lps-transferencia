@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
   <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0">Editar Landing Page</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item"><a href="{{route('landing-pages.index')}}">Landing pages</a></li>
            <li class="breadcrumb-item active">Editar Landing Page</li>
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
            <h3 class="card-title">Editar Landing Page</h3>
         </div>
         <form role="form" action="{{route('landing-pages.update', $landingPage->id)}}" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="card-body">
               <div class="form-row mb-3">
                  <div class="col-12 col-md-5">
                     <label>Nome da landing page</label>
                     <input type="text" name="title" class="form-control" value="{{$landingPage->title}}" required>
                     <div class="invalid-feedback">
                        Por favor, informe o nome da landing page
                     </div>
                  </div>
                  <div class="col-4 col-md-2">
                     <label>Subdomínio</label>
                     <a href="http://{{$landingPage->domain}}" class="btn btn-outline-primary btn-block" target="_blank"><i class="fas fa-link"></i> Acessar</a>
                  </div>
                  <div class="col-4 col-md-2">
                     <label>Link provisório</label>
                     <a href="{{asset('storage/landing-pages/'.$landingPage->domain.'/index.php')}}" class="btn btn-outline-primary btn-block" target="_blank"><i class="fas fa-link"></i> Acessar</a>
                  </div>
                  <div class="col-4 col-md-3">
                     <label>Virtual host</label>
                     <button type="button" class="btn btn-outline-primary btn-block" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-globe"></i> Configurar domínio
                      </button>
                  </div>
               </div>
               <div class="form-row py-3">
                  <div class="col-12">
                     <label>HTML da página principal <br><small class="text-muted">(Código da página principal, caso precise modificar algo.)</small></label>
                     <textarea name="code" id="htmlCode" class="p-3"></textarea>
                  </div>
               </div>
            </div>
            <div class="card-footer">
               <button type="submit" class="btn btn-outline-success float-right">Atualizar landing page</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="modal fade" id="modal-lg">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title"><i class="fas fa-globe"></i> Configurar domínio</h4>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="form-row">
            <div class="col-12">
               <label>1º passo</label>
               <p>Crie um arquivo em seu servidor chamado <code>{{$landingPage->domain}}.conf</code> e salve na pasta  <i class="fas fa-path"></i> <code>/etc/apache2/sites-available/</code> com o seguinte conteúdo: </p>
               <textarea class="form-control" cols="30" rows="9" disabled>
                  <VirtualHost *:80>
                     ServerAdmin {{$settings->ServerAdmin}}
                     ServerName {{$landingPage->domain}}
                     ServerAlias {{$landingPage->domain}}
                     DocumentRoot "{{$settings->DocumentRoot}}{{$landingPage->domain}}"
                     ErrorLog "logs/{{$landingPage->domain}}-error.log"
                     CustomLog "logs/{{$landingPage->domain}}-access.log" common
                 </VirtualHost>
               </textarea>
            </div>
         </div>
         <div class="form-row">
            <div class="col-12">
               <label>2º passo</label>
               <p>Reinicie o Apache para fazer com que estas alterações tenham efeito.</p>
            </div>
         </div>
         <div class="form-row">
            <div class="col-12">
               <label>3º passo</label>
               <p>Certifique-se de que ao acessar o domínio <a href="http://{{$landingPage->domain}}" target="_blank">{{$landingPage->domain}}</a>, esteja tudo certo.</p>
            </div>
         </div>
       </div>
       <div class="modal-footer justify-content-between">
         <button type="button" class="btn btn-default" data-dismiss="modal">Compreendido</button>
       </div>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <!-- /.modal -->
@stop
@section('css')
@stop
@section('js')
<script>
   $(function () {
       $.get('../../../storage/landing-pages/{{$landingPage->domain}}/index.php',  function(data){
         var text = $('textarea#htmlCode').val(data);
           CodeMirror.fromTextArea(document.getElementById("htmlCode"), {
               lineNumbers: true,
               mode: "htmlmixed",
               theme: "monokai"
           }).setSize("100%", 610);
       })
   })
</script>
@stop