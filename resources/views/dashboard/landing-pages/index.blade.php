@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<div class="container-fluid">
   <div class="row mb-2">
      <div class="col-sm-6">
         <h1 class="m-0">Landing pages</h1>
      </div>
      <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Painel administrativo</a></li>
            <li class="breadcrumb-item active">Landing pages</li>
         </ol>
      </div>
   </div>
   <div class="row mb-2">
    <div class="col-md-12">
       <div class="btn-group float-right">
          <a class="btn btn-outline-primary btn-flat" href="{{route('landing-pages.create')}}"><i class="fas fa-plus"></i> Cadastrar nova</a>
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
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mostrar todas as landing page</h3>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap" style="min-height: 200px;">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Subdomínio / Domínio</th>
                <th>Usuário</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($landingPages as $landingPage)
                <tr>
                    <td>{{$landingPage->title}}</td>
                    <td>{{$landingPage->domain}}</td>
                    <td>{{$landingPage->user->name}}</td>
                    <td>
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                              <span class="sr-only"></span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <a class="dropdown-item" href="http://{{$landingPage->domain}}" target="_blank">Acessar landing page</a>
                              <a class="dropdown-item" href="{{route('landing-pages.edit', $landingPage->id)}}">Editar landing page</a>
                              <div class="dropdown-divider"></div>
                              <form method="POST" action="{{route('landing-pages.destroy', $landingPage->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="dropdown-item text-danger" value="Excluir landing page">
                              </form>
                            </div>
                          </div>
                    </td>
                </tr>
              @empty
                  <tr>
                    <td colspan="4">
                      <p class="text-center py-5">Nenhuma landing page encontrada</p>
                    </td>
                  </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
   </div>
</div>
@stop
@section('css')
@stop
@section('js')
@stop