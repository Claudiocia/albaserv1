<?php

namespace App\Http\Controllers;

use App\Forms\RoleForm;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $roles = Role::with('users')->orderBy('system')->paginate(20);

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $form = \FormBuilder::create(RoleForm::class, [
            'url' => route('admin.roles.store'),
            'method' => 'POST',
        ]);

        return \view('admin.roles.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        \Validator::make($data, [
            'system' => ['required', 'string', 'max:20']
        ], [
            'system.required' => 'Dê um nome para o sistema!',
            'system.max' => 'O tamanho máximo do sistema deve ser do 20 caracteres',
        ])->validate();

        Role::create($data);
        $request->session()->flash('msg', 'Role criado com sucesso');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Role $role
     * @return View
     */
    public function show(Role $role)
    {
        return \view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return View
     */
    public function edit(Role $role)
    {
        $form = \FormBuilder::create(RoleForm::class, [
            'url' => route('admin.roles.update', ['role' => $role->id]),
            'method' => 'PUT',
            'model' => $role,
            'data' => ['id' => $role->id],
        ]);

        return \view('admin.roles.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  Role $role
     * @return RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->all();
        \Validator::make($data, [
            'system' => ['required', 'string', 'max:20']
        ], [
            'system.required' => 'Dê um nome para o sistema!',
            'system.max' => 'O tamanho máximo do sistema deve ser do 20 caracteres',
        ])->validate();
        $role->fill($data);
        $role->save();

        $request->session()->flash('msg', 'Role alterado com sucesso');
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request, Role $role)
    {
        $role->delete();
        $request->session()->flash('msg', 'Role deletado com sucesso');
        return redirect()->route('admin.roles.index');
    }
}
