<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leitura;

class LeituraController extends Controller
{
    function index()
    {
        $leituras = Leitura::All();

        return view('LeituraList')->with(['leitura' => $leituras]);
    }
    function create()
    {

        return view('LeituraForm');
    }


    function store(Request $request)
    {
        $request->validate(
            [
                'data_leitura' => 'required ',
                'hora_leitura' => 'required ',
                'valor_sensor' => 'required ',
                'sensor_id' => 'required ',
                'mac_id' => 'required',


            ],
            [
                'data_leitura.required' => 'A data leitura  é obrigatório',
                'hora_leitura.required' => 'O telefone é obrigatório',
                'valor_sensor.required' => 'O telefone é obrigatório',
                'sensor_id.required' => 'O telefone é obrigatório',
                'mac_id.required' => 'O telefone é obrigatório',



            ]
        );

        Leitura ::create([
            'data_leitura' => $request->data_leitura,
            'hora_leitura' => $request->hora_leitura,
            'valor_sensor' => $request->valor_sensor,
            'sensor_id' => $request->sensor_id,
            'mac_id' => $request->mac_id,


        ]);

        return \redirect()->action(
            'App\Http\Controllers\LeituraController@index'
        );
    }

    function edit($id)
    {
        $leitura= Leitura::findOrFail($id);
        return view('LeituraForm')->with([
            'leitura' => $leitura,
        ]);
    }

    function show($id)
    {
        $leitura = Leitura::findOrFail($id);
        return view('LeituraForm')->with([
            'leitura' => $leitura,
        ]);
    }

    function update(Request $request)
    {
        $request->validate(
            [
                'data_leitura' => 'required ',
                'hora_leitura' => 'required ',
                'valor_sensor' => 'required ',
                'sensor_id' => 'required ',
                'mac_id' => 'required',

            ],
            [
                'data_leitura.required' => 'A data leitura  é obrigatório',
                'hora_leitura.required' => 'O telefone é obrigatório',
                'valor_sensor.required' => 'O telefone é obrigatório',
                'sensor_id.required' => 'O telefone é obrigatório',
                'mac_id.required' => 'O telefone é obrigatório',

            ]
        );


        Leitura::updateOrCreate(
            ['id' => $request->id],
            [
                'data_leitura' => $request->data_leitura,
                'hora_leitura' => $request->hora_leitura,
                'valor_sensor' => $request->valor_sensor,
                'sensor_id' => $request->sensor_id,
                'mac_id' => $request->mac_id,
            ]
        );

        return \redirect()->action(
            'App\Http\Controllers\LeituraController@index'
        );
    }
    //

    function destroy($id)
    {
        $leitura = Leitura::findOrFail($id);

        $leitura->delete();

        return \redirect()->action(
            'App\Http\Controllers\LeituraController@index'
        );
    }

    function search(Request $request)
    {
        if ($request->campo == 'nome') {
            $leituras = Leitura::where(
                'nome',
                'like',
                '%' . $request->valor . '%'
            )->get();
        } else {
            $leituras = Leitura::all();
        }


        return view('LeituraList')->with(['leituras' => $leituras]);
    }
}
// npm install --save-dev vite laravel-vite-plugin
// npm install --save-dev @vitejs/plugin-vue
// npm run build
