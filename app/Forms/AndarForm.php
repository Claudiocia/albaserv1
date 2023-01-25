<?php

namespace App\Forms;

use App\Models\Ala;
use App\Models\Predio;
use Kris\LaravelFormBuilder\Form;

class AndarForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text')
            ->add('predio_id', 'select', [
                'label' => 'Predio',
                'choices' => Predio::all()->pluck('nome', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->ala->predio->id : '',
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('ala_id', 'select', [
                'label' => 'Ala',
                'choices' => Ala::all()->pluck('nome', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->ala->id : '',
                'multiple' => false,
                'expanded' => true,
            ]);
    }
}
