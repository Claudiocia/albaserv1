<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DepartForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('localiz', 'text')
            ->add('tel', 'text')
            ->add('email', 'text')
            ->add('url', 'text')
            ->add('super_id', 'text')
            ->add('predio_id', 'text');
    }
}
