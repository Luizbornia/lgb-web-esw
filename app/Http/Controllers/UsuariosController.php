<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table("usuarios")->get();
        return view("listar", ["usuarios"=>$dados]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("novo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nome'     => 'required|min:3|max:128',
            'idade'    => 'required|numeric|min:0',
            'email'    => 'required',
            'telefone' => 'required',
        ], [], ["nome" => "nome", "idade" => "idade", "email" => "email", "telefone" => "telefone"]);

        if ($validation->fails()) {
            return redirect("usuarios/novo")->withErrors($validation)->withInput();
        } else {
            DB::table("usuarios")->insert([
                "nome"     => $request->nome,
                "idade"    => $request->idade,
                "email"    => $request->email,
                "telefone" => $request->telefone
            ]);

            return redirect("/usuarios")->with("mensagem", "Usuario cadastrado com sucesso!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = DB::table("usuarios")->where("id", $id)->first();

        return view("detalhes", ["usuario" => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = DB::table("usuarios")->where("id", $id)->first();

        return view("editar", ["usuario" => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            "nome"     => "required|min:3|max:128",
            "idade"    => "required|numeric|min:0",
            "email"    => "required",
            "telefone" => "required"
        ], [], ["nome" => "nome", "idade" => "idade", "email" => "email", "telefone" => "telefone"]);

        if ($validation->fails()) {
            return redirect("usuarios/novo")->withErrors($validation)->withInput();
        } else {
            DB::table("usuarios")->where("id", $id)->update([
                "nome"     => $request->nome,
                "idade"    => $request->idade,
                "email"    => $request->email,
                "telefone" => $request->telefone
            ]);
            return redirect("/usuarios")->with("mensagem", "Usuario alterado com sucesso!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("usuarios")->where("id", $id)->delete();
        return redirect("/usuarios")->with("mensagem", "Excluído com sucesso!");
    }
}
