<?php

namespace App\Forms;

use App\Models\Alba;
use Kris\LaravelFormBuilder\Form;

class PredioForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('alba_id', 'select', [
                'label' => 'Assembleia',
                'choices' => Alba::where('sigla', '=', 'ALBA')->pluck('nome', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->alba->id : '',
                'multiple' => false,
                'expanded' => true,
        ]);
    }
}
