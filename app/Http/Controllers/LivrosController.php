<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livros;
use App\Models\Generolivro;

class LivrosController extends Controller
{
    function index()
    {
        $livros = Livros::All();
        // dd($livros);

        return view('LivrosList')->with(['livros' => $livros]);
    }

    function create()
    {
        $generolivros = Generolivro::orderBy('nome')->get();


        return view('LivrosForm')->with(['generolivros' => $generolivros]);
    }

    function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'valor' => 'required | max: 20',
                'generolivro_id' => ' nullable',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'valor.required' => 'O valor  é obrigatório',
                'valor.max' => 'Só é permitido 20 caracteres',

            ]
        );

        $imagem = $request->file('imagem');
        $nome_arquivo = '';
        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        //dd( $request->nome);
       Livros::create([
            'nome' => $request->nome,
            'valor' => $request->valor,

            'generolivro_id' => $request->generolivro_id,
            'imagem' => $nome_arquivo,
        ]);

        return \redirect()->action(
            'App\Http\Controllers\LivrosController@index'
        );
    }

    function edit($id)
    {
        //select * from livros where id = $id;
        $livros = Livros::findOrFail($id);
        //dd($livros);
        $generolivros = Generolivro::orderBy('nome')->get();

        return view('LivrosForm')->with([
            'livros' => $livros,
            'generolivros' => $generolivros,
        ]);
    }

    function show($id)
    {
        //select * from livros where id = $id;
        $livros = Livros::findOrFail($id);
        //dd($livros);
        $generolivros = Generolivro::orderBy('nome')->get();

        return view('LivrosForm')->with([
            'livros' => $livros,
            'generolivros' => $generolivros,
        ]);
    }

    function update(Request $request)
    {
        //dd( $request->nome);
        $request->validate(
            [
                'nome' => 'required | max: 120',
                'valor' => 'required | max: 20',
                'generolivro_id' => ' nullable',
                'imagem' => ' nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nome.required' => 'O nome é obrigatório',
                'nome.max' => 'Só é permitido 120 caracteres',
                'valor.required' => 'O Valor é obrigatório',
                'valor.max' => 'Só é permitido 20 caracteres',
            ]
        );

        $imagem = $request->file('imagem');
        $nome_arquivo = '';
        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . '.' . $imagem->getClientOriginalExtension();

            $diretorio = 'imagem/';
            $imagem->storeAs($diretorio, $nome_arquivo, 'public');
            $nome_arquivo = $diretorio . $nome_arquivo;
        }

        Livros::updateOrCreate(
            ['id' => $request->id],
            [
                'nome' => $request->nome,
                'valor' => $request->valor,
                'generolivro_id' => $request->generolivro_id,
                'imagem' => $nome_arquivo,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\LivrosController@index'
        );
    }
    //

    function destroy($id)
    {
        $livros = Livros::findOrFail($id);

        $livros->delete();

        return \redirect()->action(
            'App\Http\Controllers\LivrosController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $livros = Livros::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $livros = Livros::all();
        }

        //dd($livros);
        return view('LivrosList')->with(['livros' => $livros]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build

