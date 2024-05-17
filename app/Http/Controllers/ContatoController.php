<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Categoria;

class ContatoController extends Controller
{
    /**
     * Create a new controller instance.
     * @param \App\Models\Contato $contatos
     * @return void
     */
    public function __construct(Contato $contatos, Categoria $categorias)
    {
        $this->contatos = $contatos;
        $this->tipoTelefones = ['Fixo',  'Celular'];
        $this->categorias = $categorias;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contatos = $this->contatos->all();

        return view('contatos.index', compact('contatos'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = $this->categorias->all();
        $tipoTelefones = $this->tipoTelefones;
        return view('contatos.form', compact('categorias', 'tipoTelefones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
