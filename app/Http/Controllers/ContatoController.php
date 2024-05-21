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
        $this->telefoneNumeros = new TelefoneNumero;
        $this->enderecos = new Endereco;
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

        $contato = $this->contatos->create
        ([
                'nome' => $request->nome,
            ]);

        $this->enderecos->create
        ([
                'rua' => $request->rua,
                'cidade' => $request->cidade,
                'numero' => $request->numero,
                'contato_id' => $contato->id
            ]);

        for ($i = 0; $i < count($request->numero); $i++)
        {
            $this->telefoneNumeros->create
            ([
                    'numero' => $request->numero[$i],
                    'tipo' => $request->tipo[$i],
                    'contato_id' => $contato->id
                ]);
        }

        $contato->categoriaRelationship()->attach($request->categoria);
        return redirect()->route('contatos.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $form = 'disabled';


        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;


        return view('contatos.show', compact('contato','categorias', 'tipoTelefones','form'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $contato = $this->contatos->find($id);
        $categorias = $this->categorias;
        $tipoTelefones = $this->tipoTelefones;
        return view('contatos.form', compact('contato', 'categorias', 'tipoTelefones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $contato = $this->contatos->find($id);
        $endereco = $contato->endereco;
        $endereco->update
        ([
            'rua' => $request->rua,
            'cidade' => $request->cidade,
            'numero' => $request->numero,
            'contato_id' => tap($this->contato)->update([
                'nome' => $request->nome
                ])->id,
    //tap é um helper que executa uma função e retorna o objeto, se nao fosse por ele eu iria pegar um true ou false.
            ]);

        $contato->telefoneNumeroRelationship()->delete();

        for ($i = 0; $i < count($request->numero); $i++)
        {
            $this->telefoneNumeros->create
            ([
                    'numero' => $request->numero[$i],
                    'tipo' => $request->tipo[$i],
                    'contato_id' => $contato->id
                ]);
        }

        $contato->categoriaRelationship()->sync($request->categoria);
        return redirect()->route('contatos.show', $contato->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contato = $this->contatos->find($id);
        $contato->enderecoRelationship()->delete();
        $contato->telefoneNumeroRelationship()->delete();
        $contato->categoriaRelationship()->sync(null);
        $contato->delete();
        return redirect()->route('contatos.index');
    }
}
