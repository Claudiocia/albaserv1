<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('cpf', 'text')
            ->add('email', 'text')
            ->add('cadastro', 'text')
            ->add('depart', 'text')
            ->add('password', 'text')
            ->add('role', 'text');
    }
}
