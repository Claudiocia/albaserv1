<?php

namespace App\Http\Controllers;

use App\Forms\AlbaForm;
use App\Models\Alba;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlbaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request  $request)
    {
        $search = $request->get('search');
        if ($search == null) {
            $albas = Alba::orderBy('id', 'ASC')->paginate();
        }else{
            $albas = Alba::where('tag', 'LIKE','%'.$search.'%')->paginate();
        }
        return view('pesq.albas.index', compact('albas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $form = \FormBuilder::create(AlbaForm::class, [
            'url' => route('pesq.albas.store'),
            'method' => 'POST'
        ]);

        return view('pesq.albas.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $form = \FormBuilder::create(AlbaForm::class);
        $data = $form->getFieldValues();
        \Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'sigla' => ['required', 'string'],
            'end' => ['required', 'max:255'],
            'bairro' => ['required'],
            'cep' => ['required'],
            'cidade' => ['required'],
            'uf' => ['required', 'max:2'],
        ], [
            'nome.required' => 'É preciso informar o nome da Assembleia Legislativa',
            'nome.max' => 'O nome não pode ultrapassar 255 toques',
            'sigla.required' => 'É preciso informar a sigla da Assembleia',
            'end.required' => 'É necessário informar o endereço',
            'bairro.required' => 'É necessário informar o bairro',
            'cep.required' => 'É necessário informar o CEP',
            'cidade.required' => 'Informe o nome da Cidade',
            'uf.required' => 'Informe a sigla do estado',
            'uf.max' => 'Informe apenas a sigla do estado',
        ])->validate();

        $data['tag'] = $data['nome'].' '.$data['sigla'].' '.$data['cidade'].' '.$data['uf'].' '.$data['cep'].' '
            .$data['bairro'].' '.$data['email'].' '.$data['url'].' '.$data['presid'];
        Alba::create($data);
        $request->session()->flash('msg', 'Assembleia Criada com sucesso');
        return redirect()->route('pesq.albas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Alba $alba
     * @return View
     */
    public function show(Alba $alba)
    {
        return view('pesq.albas.show', compact('alba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Alba $alba
     * @return View
     */
    public function edit(Alba $alba)
    {
        $form = \FormBuilder::create(AlbaForm::class, [
            'url' => route('pesq.albas.update', ['alba' => $alba->id]),
            'method' => 'PUT',
            'model' => $alba,
        ]);

        return view('pesq.albas.edit', compact('form', 'alba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Alba $alba
     * @return RedirectResponse
     */
    public function update(Request $request, Alba $alba)
    {
        $data = $request->all();
        \Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'sigla' => ['required', 'string'],
            'end' => ['required', 'max:255'],
            'bairro' => ['required'],
            'cep' => ['required'],
            'cidade' => ['required'],
            'uf' => ['required', 'max:2'],
        ], [
            'nome.required' => 'É preciso informar o nome da Assembleia Legislativa',
            'nome.max' => 'O nome não pode ultrapassar 255 toques',
            'sigla.required' => 'É preciso informar a sigla da Assembleia',
            'end.required' => 'É necessário informar o endereço',
            'bairro.required' => 'É necessário informar o bairro',
            'cep.required' => 'É necessário informar o CEP',
            'cidade.required' => 'Informe o nome da Cidade',
            'uf.required' => 'Informe a sigla do estado',
            'uf.max' => 'Informe apenas a sigla do estado',
        ])->validate();

        $alba->fill($data);
        $alba->save();

        $request->session()->flash('msg', 'Cadastro Alterado com sucesso');
        return redirect()->route('pesq.albas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param  Alba $alba
     * @return RedirectResponse
     */
    public function destroy(Request  $request, Alba $alba)
    {
        $alba->delete();
        $request->session()->flash('msg', 'Assembleia deletada com sucesso.');
        return redirect()->route('pesq.albas.index');
    }
}
