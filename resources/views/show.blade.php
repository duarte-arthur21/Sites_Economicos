@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="css/style.css">
@endsection

@section('title', 'Lista de Usuários')
@php
    $page = 'View mail';
@endphp


@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">

            <div id="info-container" class="col-md-6">

                <h1>{{$msg->assunto}}</h1>
                    <p class="mail-name">{{$msg->name}}</p>
                    <p class="mail-email">{{$msg->email}}</p>
                    <p class="mail-date">{{$msg->created_at}}</p>
                    <p class="mail-texto">{{$msg->texto}}</p>

            </div>
        </div>
    </div>
@endsection
