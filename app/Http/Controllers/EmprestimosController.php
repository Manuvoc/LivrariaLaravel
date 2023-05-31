<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;
use App\Models\Livros;

class EmprestimosController extends Controller
{
    function index()
    {
        $emprestimos = Emprestimo::All();
        // dd($Emprestimos);

        return view('EmprestimosList')->with(['emprestimos' => $emprestimos]);
    }

    function create()
    {

        $livros = Livros::orderBy('nome')->get();



        return view('EmprestimosForm')->with(['livros' => $livros]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'livros_id' => 'required | max: 120',
                'dataretirada' => 'required' ,
                'datadevolucao' => 'required' ,
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'livros_id' => 'O nome é obrigatório',
                'dataretirada' => 'O valor  é obrigatório',

                'datadevolucao' => 'O valor  é obrigatório',


            ]
        );



        //dd( $request->nome);
        Emprestimo::create([
            'livros_id' => $request->livros_id,
            'dataretirada' => $request->dataretirada,
            'datadevolucao' => $request->datadevolucao,


        ]);

        return \redirect()->action(
            'App\Http\Controllers\EmprestimosController@index'
        );
    }

    function edit($id)
    {
        //select * from Emprestimos where id = $id;
        $emprestimos = Emprestimo::findOrFail($id);
        //dd($Emprestimos);
        $livros = Livros::orderBy('nome')->get();

        return view('EmprestimosForm')->with([
            'emprestimos' => $emprestimos,
            'livros' => $livros,
        ]);
    }

    function show($id)
    {
        //select * from Emprestimos where id = $id;
        $emprestimos = Emprestimo::findOrFail($id);
        //dd($Emprestimos);
        $livros = Livros::orderBy('nome')->get();

        return view('EmprestimosForm')->with([
            'emprestimos' => $emprestimos,
            'livros' => $livros,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'livros_id' => 'required | max: 120',
                'dataretirada' => 'required | max: 20',
                'datadevolucao' => 'required | max: 20',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'livros_id.required' => 'O nome é obrigatório',

                'dataretirada.required' => 'O data retirada é obrigatório',

                'datadevolucao.required' => 'O data retirada é obrigatório',

            ]
        );



        Emprestimo::updateOrCreate(
            ['id' => $request->id],
            [
                'livros_id' => $request->livros_id,
                'dataretirada' => $request->dataretirada,
                'datadevolucao' => $request->datadevolucao,
               
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\EmprestimosController@index'
        );
    }
    //

    function destroy($id)
    {
        $emprestimos = Emprestimo::findOrFail($id);

        $emprestimos->delete();

        return \redirect()->action(
            'App\Http\Controllers\EmprestimosController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $emprestimos = Emprestimo::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $emprestimos = Emprestimo::all();
        }

        //dd($Emprestimos);
        return view('EmprestimosList')->with(['emprestimos' => $emprestimos]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build

