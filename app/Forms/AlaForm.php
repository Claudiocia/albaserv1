<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AlaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text');
    }
}
