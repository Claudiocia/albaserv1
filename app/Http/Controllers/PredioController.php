<?php

namespace App\Http\Controllers;

use App\Forms\PredioForm;
use App\Models\Predio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $predios = Predio::Paginate();
        return view('pesq.predios.index', compact('predios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form = \FormBuilder::create(PredioForm::class, [
            'url' => route('pesq.predios.store'),
            'method' => 'POST'
        ]);

        return view('pesq.predios.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(PredioForm::class);
        $data = $form->getFieldValues();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'alba_id' => ['required']
        ])->validate();
        Predio::create($data);
        $request->session()->flash('msg', 'Prédio criado com sucesso');
        return redirect()->route('pesq.predios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Predio $predio
     * @return \Illuminate\View\View
     */
    public function show(Predio $predio)
    {
        return \view('pesq.predios.show', compact('predio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Predio $predio
     * @return \Illuminate\View\View
     */
    public function edit(Predio $predio)
    {
        $form = \FormBuilder::create(PredioForm::class, [
            'url' => route('pesq.predios.update', ['predio' => $predio->id]),
            'method' => 'PUT',
            'model' => $predio,
        ]);
        return view('pesq.predios.edit', compact('form', 'predio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Predio $predio
     * @return RedirectResponse
     */
    public function update(Request $request, Predio $predio)
    {
        $data = $request->all();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:10', 'max:255'],
            'alba_id' => ['required']
        ])->validate();
        $predio->fill($data);
        $predio->save();

        $request->session()->flash('msg', 'Cadastro Alterado com sucesso');
        return redirect()->route('pesq.predios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request,
     * @param Predio $predio
     * @return RedirectResponse
     */
    public function destroy(Request $request, Predio $predio)
    {
        $predio->delete();
        $request->session()->flash('msg', 'Predio deletado com sucesso.');
        return redirect()->route('pesq.predios.index');
    }
}
