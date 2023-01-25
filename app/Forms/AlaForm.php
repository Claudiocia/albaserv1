<?php

namespace App\Forms;

use App\Models\Predio;
use Kris\LaravelFormBuilder\Form;

class AlaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('predio_id', 'select', [
                'label' => 'Prédio',
                'choices' => Predio::all()->pluck('nome', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->predio->id : '',
                'multiple' => false,
                'expanded' => true,
            ]);
    }
}
