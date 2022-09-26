<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PredioForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text');
    }
}
