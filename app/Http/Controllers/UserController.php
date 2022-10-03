<?php

namespace App\Http\Controllers;

use App\Forms\RoleUserForm;
use App\Forms\UserForm;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function pesq()
    {
        return view('pesq.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.users.store'),
            'method' => 'POST'
        ]);
        return view('admin.users.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $data = $request->all();
        \Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'cpf', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cadastro' => ['required', 'unique:users'],
        ])->validate();
        $data['password'] = bcrypt('91316445');

         User::create($data);

        $request->session()->flash('msg', 'Usuário cadastrado com sucesso');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     */
    public function show(User $user) : View
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function edit(User $user) : View
    {
        $form = \FormBuilder::create(UserForm::class, [
            'url' => route('admin.users.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user
        ]);

        return view('admin.users.edit', compact('form', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return View
     */
    public function rolerel(User $user) : View
    {
        $id = $user->id;
        $user = User::whereId($id)->with('roles')->first();
        $form = \FormBuilder::create(RoleUserForm::class, [
            'url' => route('admin.users.update', ['user' => $user->id]),
            'method' => 'PUT',
            'model' => $user,
        ]);

        return \view('admin.users.role-rel', compact('form'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user) : RedirectResponse
    {
        $data = $request->all();
        if ($data['role']){
            if (key_exists('role_id', $data)){
                $user->roles()->sync($data['role_id']);
            }else{
                $user->roles()->detach();
            }
        }
        $user->fill($data);
        $user->save();

        $request->session()->flash('msg', 'Usuário Atualizado');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request, User $user) : RedirectResponse
    {
        $user->roles()->detach();
        $user->delete();

        $request->session()->flash('msg', 'Usuário deletado com sucesso');
        return redirect()->route('admin.users.index');
    }
}
