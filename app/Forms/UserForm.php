<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => 'Nome',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['oninput' => 'handleInput(event)', 'required' => 'required'],
            ])->add('email', 'email', [
                'label' => 'E-mail',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required', 'id' => 'email'],
            ], $modify = true)
            ->add('cpf', 'text', [
                'label' => 'CPF',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required', 'id' => 'cpf'],
            ])
            ->add('cadastro', 'text', [
                'label' => 'Cadastro',
                'label_attr' => ['class' => 'control-label required'],
                'attr' => ['required' => 'required'],
            ])
            ->add('role', 'hidden', [
                'value' => false,
            ])
            ->add('depart', 'text', [
                'label' => 'Departamento'
            ]);
    }
}
