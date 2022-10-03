<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AndarForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text');
    }
}
