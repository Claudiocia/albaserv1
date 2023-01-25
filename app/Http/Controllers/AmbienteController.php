<?php

namespace App\Http\Controllers;

use App\Forms\AmbienteForm;
use App\Models\Ala;
use App\Models\Ambiente;
use App\Models\Andar;
use App\Models\Predio;
use http\Client\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AmbienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $ambientes = Ambiente::with('andar')->orderBy('id', 'ASC')->paginate();
        return view('pesq.ambientes.index', compact('ambientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $form = \FormBuilder::create(AmbienteForm::class, [
            'url' => route('pesq.ambientes.store'),
            'method' => 'POST',
        ]);

        return view('pesq.ambientes.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $idPredio
     */
    public function getAlas(int $idPredio)
    {
        $alas = Ala::wherePredioId($idPredio)->get(['id', 'nome']);
        return \Response::json($alas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  int  $idAla
     */
    public function getAndars(int $idAla)
    {
        $andars = Andar::whereAlaId($idAla)->get(['id', 'nome']);
        return \Response::json($andars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(AmbienteForm::class);
        $data = $form->getFieldValues();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'num' => ['required'],
            'andar_id' => ['required'],
            'tipo' => ['required'],
        ])->validate();

        Ambiente::create($data);
        $request->session()->flash('msg', 'Registro salvo com sucesso');
        return redirect()->route('pesq.ambientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Ambiente $ambiente
     * @return View
     */
    public function show(Ambiente $ambiente)
    {
        return \view('pesq.ambientes.show', compact('ambiente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ambiente $ambiente
     * @return View
     */
    public function edit(Ambiente $ambiente)
    {
        $form = \FormBuilder::create(AmbienteForm::class, [
            'url' => route('pesq.ambientes.update', ['ambiente' => $ambiente->id]),
            'method' => 'PUT',
            'model' => $ambiente,
        ]);

        return \view('pesq.ambientes.edit', compact('form', 'ambiente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Ambiente $ambiente
     * @return RedirectResponse
     */
    public function update(Request $request, Ambiente $ambiente)
    {
        $data = $request->all();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'num' => ['required'],
            'andar_id' => ['required'],
            'tipo' => ['required'],
        ])->validate();
        $ambiente->fill($data);
        $ambiente->save();
        $request->session()->flash('msg', 'Cadastro atualizado com sucesso');
        return redirect()->route('pesq.ambientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  Ambiente $ambiente
     * @return RedirectResponse
     */
    public function destroy(Request $request, Ambiente $ambiente)
    {
        $ambiente->delete();
        $request->session()->flash('msg', 'Registro deletado com sucesso.');
        return redirect()->route('pesq.ambientes.index');
    }
}
