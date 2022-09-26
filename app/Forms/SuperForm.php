<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class SuperForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('localiz', 'text')
            ->add('tel', 'text')
            ->add('email', 'text')
            ->add('url', 'text')
            ->add('predio_id', 'text');
    }
}
