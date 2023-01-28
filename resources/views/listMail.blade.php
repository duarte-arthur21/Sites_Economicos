@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('...') }}">
@endsection

@section('title', 'Home page')
@php
    $page = 'welcome';
@endphp

@section('content')
<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

        <form action="{{route('listMails.delete')}}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h1 class="modal-title fs-5">Deletar Mensagem</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="mail_delete_id" id="mail_id">
                <h5>Deseja deletar essa mensagem ?</h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Sim, Deletar</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- Modal Escrever-->
<div class="modal fade" id="escreverModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

    <form action="{{route('create.mailAdmin')}}" method="POST">
      @csrf
      <div class="modal-body">
                <input  name="email" class="form-control col-sm-12" type="text" placeholder="E-mail*">
            </div>
            <div class="modal-body">
                <select name="assunto" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                    <option class="dropdown-menu" aria-labelledby="dropdownMenuButton1">Selecione tipo de Assunto</option>
                    <option class="dropdown-item" value="Assunto1">Assunto 1</option>
                    <option class="dropdown-item" value="Assunto2">Assunto 2</option>
                    <option class="dropdown-item" value="Assunto3">Assunto 3</option>
                    <option class="dropdown-item" value="Assunto4">Assunto 4</option>
                    <option class="dropdown-item" value="Assunto5">Assunto 5</option>
                </select>
          </div>
          <div class="modal-body">
                <textarea class="form-control" name="texto" placeholder="Escreva sua mensagem"></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                    <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
                </svg>  Enviar
            </button>
          </div> 
    </form>

    </div>
  </div>
</div>


<nav class="navbar navbar-light bg-primary justify-content-between">
	<p class="navbar-brand">Mensagens Recebidas</p>    

    <div id="adminMailBtn" class="card-body ">
        <button type="button" class="btn btn-default float-right">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>        Escrever
        </button>
    </div>
</nav>

<div class="card-body">
        <form action="{{route('listMails.search')}}" method="post">
                @csrf
                <select name="searchAssunto" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                <option class="dropdown-menu" aria-labelledby="dropdownMenuButton1">Selecione tipo de Assunto</option>
                    <option class="dropdown-item" value="Assunto1">Assunto 1</option>
                    <option class="dropdown-item" value="Assunto2">Assunto 2</option>
                    <option class="dropdown-item" value="Assunto3">Assunto 3</option>
                    <option class="dropdown-item" value="Assunto4">Assunto 4</option>
                    <option class="dropdown-item" value="Assunto5">Assunto 5</option>
                </select>

                <select name="searchLida" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">
                    <option class="dropdown-menu" aria-labelledby="dropdownMenuButton1">Selecione Status</option>
                    <option class="dropdown-item" value=0 >Não lida</option>
                    <option class="dropdown-item" value=1>Lida</option>
                </select>

                <button type="submit" class="btn btn-default">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                        <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                    </svg>   Filtrar
                </button>                
        </form>
    </div>

<div id="msg-container" class="col-md-12">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($msgs as $msg)
                <tr>
                    <td class="view-message ">{{$msg->id}}</td>	
                    <td class="view-message ">{{$msg->name}}</td>
                    <td class="view-message ">{{$msg->email}}</td>
                    <td class="view-message ">{{$msg->assunto}}</td>
                    <td>
                        <form action="{{ route('listMails.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $msg->id }}"/>

                            <div class=" form-switch d-flex justify-content-center">
                                                            
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{$msg->status === 1 ? 'checked' : ''}} onChange="this.form.submit()" name="status" value="{{$msg->status}}">
                            </div>
                        </form>
                    </td>
                    <td class="btn">
                        <a href="/mensagem/{{$msg->id}}" ><i class="fa fa-eye"></i></a>
                    </td>
                    <td>
                            <button class="deleteMailBtn" type="button" value="{{$msg->id}}">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                    </td>

                </tr>
                @endforeach    
            </tbody>

    </table>
</div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
			$('.deleteMailBtn').click(function(e){ 
                e.preventDefault();

                var mail_id = $(this).val();
                $('#mail_id').val(mail_id);
                $('#deleteModal').modal('show');
			});
        });

        $(document).ready(function() {
			$('#adminMailBtn').click(function(e){ 
                e.preventDefault();

                $('#escreverModal').modal('show');
			});
        });

    </script>

@endsection