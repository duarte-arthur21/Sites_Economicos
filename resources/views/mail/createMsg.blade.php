@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('...') }}">
@endsection

@section('title', 'Lista de Usuários')
@php
    $page = 'Lista de Usuários';
@endphp


@section('content')

<div class="col-md-6 offset-md-3">
      <h1>Nova Mensagem</h1>

    <form action="/create" method="POST">
      @csrf
          <div class="form-group">
                <input  name="name" class="form-control col-sm-12" type="text" placeholder="Nome*">
          </div>
          <div class="form-group">          
                <input  name="email" class="form-control col-sm-12" type="text" placeholder="E-mail*">
            </div>
          <div class="form-group">
                <input  name="assunto" class="form-control col-sm-12" type="text" placeholder="Assunto*">
          </div>
          <div class="form-group">
                <textarea id="texto" class="form-control" name="texto" placeholder="Escreva sua mensagem"></textarea>
          </div>
          <input type="submit" class="btn btn-primary" value="Enviar">      
    </form>
</div>
@endsection
