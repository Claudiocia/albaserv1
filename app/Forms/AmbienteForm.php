<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AmbienteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text');
    }
}
