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
        $this->tipoTelefones = ['Fixo', 'Celular'];
        $this->categorias = Categoria::all()->pluck('nome', 'id');
        //isso
        $this->telefoneNumeros = new TelefoneNumero;
        $this->tipoTelefone = TelefoneNumero::all()->pluck('tipo', 'id');

        $this->endereco = new Endereco;
        //ou isso
        //$this->telefoneNumeros = TelefoneNumero::all()->pluck('numero', 'tipo', 'id');
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

        $contato= $this->contatos->create
        ([
            'nome' => $request->nome,
        ]);

        $endereco = $this->enderecos->create
        ([
            'rua' => $request->rua,
            'cidade' => $request->cidade,
            'numero' => $request->numero,
            'contato_id' => $contato->id
        ]);

    foreach ($request->numero as $numero) {
        $telefoneNumero = $this->telefoneNumeros->create([
            'numero' => $numero,
            'tipo' => $request->tipo,
            'contato_id' => $contato->id
        ]);
    }



    $contato->categoriaRelationship()->attach($request->categoria);


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
