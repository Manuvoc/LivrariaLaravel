<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;
use App\Models\Generolivro;
use App\Models\Livros;

class EstoqueController extends Controller
{
    function index()
    {
        $estoques = Estoque::All();
        // dd($Estoque);

        return view('EstoqueList')->with(['estoques' => $estoques]);
    }

    function create()
    {
        $generolivros = Generolivro::orderBy('nome')->get();
        $livros = Livros::orderBy('nome')->get();


        return view('EstoqueForm')->with(['generolivros' => $generolivros,'livros' => $livros]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'livros_id' => 'required | max: 120',
                'quantidade' => 'required',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'livros_id.required' => 'O nome é obrigatório',
                'quantidade.required' => 'O valor  é obrigatório',
                'quantidade.max' => 'Só é permitido 20 caracteres',
            ]
        );

            //dd( $request->nome);
        Estoque::create([
            'livros_id' => $request->livros_id,
            'quantidade' => $request->quantidade,
            'fornecedor' => $request->fornecedor,

        ]);

        return \redirect()->action(
            'App\Http\Controllers\EstoqueController@index'
        );
    }

    function edit($id)
    {
        //select * from Estoque where id = $id;
        $estoques = Estoque::findOrFail($id);
        //dd($Estoque);
        $generolivros = Generolivro::orderBy('nome')->get();

        return view('EstoqueForm')->with([
            'estoques' => $estoques,
            'generolivros' => $generolivros,
        ]);
    }

    function show($id)
    {
        //select * from Estoque where id = $id;
        $estoques = Estoque::findOrFail($id);
        //dd($Estoque);
        $generolivros = Generolivro::orderBy('nome')->get();

        return view('EstoqueForm')->with([
            'estoques' => $estoques,
            'generolivros' => $generolivros,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'livros_id' => 'required | max: 120',
                'quantidade' => 'required | max: 20',
                'generolivro_id' => ' nullable',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'livros_id.required' => 'O nome é obrigatório',
                'livros_id.max' => 'Só é permitido 120 caracteres',
                'quantidade.required' => 'quantidade é obrigatório',
                'quantidade.max' => 'Só é permitido 20 caracteres',
            ]
        );



        Estoque::updateOrCreate(
            ['id' => $request->id],
            [
                'livros_id' => $request->livros_id,
                'quantidade' => $request->quantidade,
                'generolivro_id' => $request->generolivro_id,
                
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\EstoqueController@index'
        );
    }
    //

    function destroy($id)
    {
        $estoques = Estoque::findOrFail($id);

        $estoques->delete();

        return \redirect()->action(
            'App\Http\Controllers\EstoqueController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $estoques = Estoque::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $estoques = Estoque::all();
        }

        //dd($Estoque);
        return view('EstoqueList')->with(['estoques' => $estoques]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build

