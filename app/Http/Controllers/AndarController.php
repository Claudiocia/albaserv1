<?php

namespace App\Http\Controllers;

use App\Forms\AndarForm;
use App\Models\Andar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AndarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $andars = Andar::with('ala')->orderBy('id', 'ASC')->paginate();
        return view('pesq.andars.index', compact('andars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $form = \FormBuilder::create(AndarForm::class, [
            'url' => route('pesq.andars.store'),
            'method' => 'POST'
        ]);
        return \view('pesq.andars.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(AndarForm::class);
        $data = $form->getFieldValues();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:5', 'max:255'],
            'ala_id' => ['required']
        ])->validate();
        Andar::create($data);
        $request->session()->flash('msg', 'Andar criado com sucesso');
        return redirect()->route('pesq.andars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Andar $andar
     * @return View
     */
    public function show(Andar $andar)
    {
        return \view('pesq.andars.show', compact('andar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Andar $andar
     * @return View
     */
    public function edit(Andar $andar)
    {
        $form = \FormBuilder::create(AndarForm::class, [
            'url' => route('pesq.andars.update', ['andar' => $andar->id]),
            'method' => 'PUT',
            'model' => $andar
        ]);

        return \view('pesq.andars.edit', compact('form', 'andar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Andar $andar
     * @return RedirectResponse
     */
    public function update(Request $request, Andar $andar)
    {
        $data = $request->all();
        Validator::make($data, [
            'nome' => ['required', 'string', 'min:5', 'max:255'],
            'ala_id' => ['required']
        ])->validate();
        $andar->fill($data);
        $andar->save();

        $request->session()->flash('msg', 'Cadastro atualizado com sucesso');
        return redirect()->route('pesq.andars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Andar $andar
     * @return RedirectResponse
     */
    public function destroy(Request $request, Andar $andar)
    {
        $andar->delete();
        $request->session()->flash('msg', 'Cadastro deletado com sucesso');
        return redirect()->route('pesq.andars.index');
    }
}
