<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mail_admin;

class MailAdminController extends Controller
{
    public function store(Request $request)
    {
        $mensagem = New Mail_admin;

        $mensagem->email = $request->email;
        $mensagem->assunto = $request->assunto;
        $mensagem->texto = $request->texto;

        $mensagem->save();

        return redirect('/')->with("sucess", "Mensagem enviada com sucesso");;
    }
}
