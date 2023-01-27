@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('...') }}">
@endsection

@section('title', 'Response Mail')
@php
    $page = 'Response Mail';
@endphp


@section('content')

<div class="col-md-6 offset-md-3">
      <h1>Nova Mensagem</h1>

    <form action="" method="POST">
      @csrf
          <div class="form-group">
                <input  name="name" class="form-control col-sm-12" type="text" placeholder="Nome*">
          </div>
          <input type="submit" class="btn btn-primary" value="Enviar">      
    </form>
</div>
@endsection
