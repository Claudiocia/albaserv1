<?php

namespace App\Http\Controllers;

use App\Forms\AlaForm;
use App\Models\Ala;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\Facades\FormBuilder;

class AlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $alas = Ala::with('predio')->orderBy('nome', 'ASC')->paginate();
        return view('pesq.alas.index', compact('alas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $form = \FormBuilder::create(AlaForm::class, [
            'url' => route('pesq.alas.store'),
            'method' => 'POST'
        ]);

        return view('pesq.alas.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(AlaForm::class);
        $data = $form->getFieldValues();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'predio_id' => ['required']
        ])->validate();
        Ala::create($data);
        $request->session()->flash('msg', 'Ala criada com sucesso');
        return redirect()->route('pesq.alas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Ala  $ala
     * @return View
     */
    public function show(Ala  $ala)
    {
        return \view('pesq.alas.show', compact('ala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Ala  $ala
     * @return View
     */
    public function edit(Ala  $ala)
    {
        $form = FormBuilder::create(AlaForm::class, [
            'url' => route('pesq.alas.update', ['ala' => $ala->id]),
            'method' => 'PUT',
            'model' => $ala,
        ]);
        return view('pesq.alas.edit', compact('form', 'ala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Ala  $ala
     * @return RedirectResponse
     */
    public function update(Request $request, Ala  $ala)
    {
        $data = $request->all();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'predio_id' => ['required']
        ])->validate();
        $ala->fill($data);
        $ala->save();

        $request->session()->flash('msg', 'Cadastro atualizado com sucesso');
        return redirect()->route('pesq.alas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Ala  $ala
     * @return RedirectResponse
     */
    public function destroy(Request  $request, Ala  $ala)
    {
        $ala->delete();
        $request->session()->flash('msg', 'Registro deletado com sucesso.');
        return redirect()->route('pesq.alas.index');
    }
}
