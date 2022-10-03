<?php

namespace App\Forms;

use App\Models\Role;
use Kris\LaravelFormBuilder\Form;

class RoleUserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('user', 'text', [
                'label' => 'Usuário',
                'value' => $this->model->name,
                'attr' => ['disabled' => 'disabled']
            ])
            ->add('user_id', 'hidden', [
                'value' => $this->model->id,
            ])
            ->add('role', 'hidden', [
                'value' => true,
            ])
            ->add('role_id', 'choice', [
                'label' => 'Sistemas autorizados',
                'choices' => Role::all()->pluck('system', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'my-wrapper label-form'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->roles->pluck('id')->toArray() : '',
                'multiple' => true,
                'expanded' => true,
            ]);
    }
}
