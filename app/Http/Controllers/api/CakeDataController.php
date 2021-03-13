<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Responses;
use App\Models\Cake;
use App\Services\CakeStoreData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CakeDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cakes = DB::table('cake')->get();
        return Responses::Success("Bolos retonados com sucesso!", $cakes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CakeStoreData::run($request->all());
        return Responses::Success("Bolo cadastrado com sucesso!", $request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cake = DB::table('cake')->where('id',  $id)->get();
        return Responses::Success("Bolo retonado pelo ID com sucesso!", $cake);
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
        $data = $request->all();

        DB::table('cake')->updateOrInsert(
            ['id' => $id],
            [
                'nome' => $data['nome'],
                'sabor' => $data['sabor'],
                'preco' => $data['preco'],
                'quantidade' => $data['quantidade'],
            ]
        );

        return Responses::Success("Bolo atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cake::find($id)->delete();
        return Responses::Success("Bolo {$id} deletado com sucesso!");
    }
}
