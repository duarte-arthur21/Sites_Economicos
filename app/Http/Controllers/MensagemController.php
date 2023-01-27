<?php

namespace App\Http\Controllers;
use App\Models\Msgs;
use Illuminate\Http\Request;

class MensagemController extends Controller
{
    public function index()
    {
        $msgs = Msgs::all();

        return view('listMail', ["msgs" => $msgs]);
    }
    
    public function search(Request $request)
    {
        $msgs = Msgs::where('status', "{$request->searchLida}")
                        ->orWhere('assunto', "{$request->searchAssunto}")
                        ->paginate();

        return view('/listMsg', compact('msgs'));
    }

    public function searchMsgLida(Request $request)
    {
        $msgs = Msgs::where('status', 1)->get();

        return view('/listMsg', compact('msgs'));
    }
   
    public function create()
    {
        return view('mail.createMsg');
    }

    public function response(Request $request)
    {
        $msgs = Msgs::find($request->status);
        $msgs->delete();
        return back()->with("sucess", "E-mail deletado com sucesso");
    }

    public function store(Request $request)
    {
        $mensagem = New Msgs;

        $mensagem->name = $request->name;
        $mensagem->email = $request->email;
        $mensagem->assunto = $request->assunto;
        $mensagem->texto = $request->texto;
        $mensagem->status = 0;

        $mensagem->save();

        return redirect('/')->with("sucess", "Mensagem enviada com sucesso");;
    }

    public function show($id)
    {
        $msgs = Msgs::findOrFail($id);

        return view('show', ["msg" => $msgs]);

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        
        $data_form = $request->all();
        $data_form['status'] = (!isset($data_form['status']))? 0 : 1;

        $msgs = Msgs::find($request->id);
        $msgs->status = $data_form['status'];
        $msgs->save();
        return back()->with("sucess", "E-mail atualizado com sucesso");
    }

    public function destroy(request $request)
    {
        $msgs = Msgs::find($request->mail_delete_id); //name do input hidden da modal 
        $msgs->delete();

        return back()->with("sucess", "E-mail deletado com sucesso");
    }

}
