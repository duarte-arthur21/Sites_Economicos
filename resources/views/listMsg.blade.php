@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('...') }}">
@endsection

@section('title', 'Lista de Usuários')
@php
    $page = 'Lista de Usuários';
@endphp


@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    @foreach($msgs as $msg)

        <form action="{{route('listMails.delete', '$msg->id')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deletar Mensagem</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="mail_delete_id" id="mail_id">
                <h5>Deseja deletar essa mensagem </h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Deletar</button>
            </div>
        </form>
    @endforeach
    </div>
  </div>
</div>

<nav class="navbar navbar-light bg-primary justify-content-between">
	<a class="navbar-brand">Mensagens Recebidas</a>    
</nav>
</div>


    <div id="msg-container" class="col-md-12">
    <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><a href=""><i class="fa fa-arrows-v" aria-hidden="true"></i></a> ID</th>
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

    </script>

@endsection
