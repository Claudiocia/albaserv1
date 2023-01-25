<?php

namespace App\Forms;

use App\Models\Ala;
use App\Models\Andar;
use App\Models\Predio;
use Kris\LaravelFormBuilder\Form;

class AmbienteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome', 'text', [
                'label' => 'Nome',
            ])
            ->add('num', 'text', [
                'label' => 'Num',
            ])
            ->add('tipo', 'choice', [
                'label' => 'Tipo',
                'choices' => ['Administrativo' => 'Administrativo', 'Operacional' => 'Operacional',
                                'Gabinete' => 'Gabinete', 'Serviço' => 'Serviço'],
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'selected' => $this->model ? $this->model->tipo : '',
                'multiple' => false,
                'expanded' => true,
            ])->add('predio_id', 'select', [
                'label' => 'Predio',
                'choices' => Predio::all()->pluck('nome', 'id')->toArray(),
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'attr' => ['id' => 'predio'],
                'empty_value' => 'Selecione...',
                'selected' => $this->model ? $this->model->andar->ala->predio->id : '',
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('ala_id', 'select', [
                'label' => 'Ala',
                'choices' => $this->model ? Ala::wherePredioId($this->model->andar->ala->predio->id)->pluck('nome', 'id')->toArray() : [],
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'attr' => ['id' => 'ala'],
                'empty_value' => 'Selecione...',
                'selected' => $this->model ? $this->model->andar->ala->id : '',
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('andar_id', 'select', [
                'label' => 'Andar',
                'choices' => $this->model ? Andar::whereAlaId($this->model->andar->ala->id)->pluck('nome', 'id')->toArray() :  [],
                'choice_options' => [
                    'wrapper' => ['class' => 'wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                ],
                'attr' => ['id' => 'andar'],
                'empty_value' => 'Selecione...',
                'selected' => $this->model ? $this->model->andar->id : '',
                'multiple' => false,
                'expanded' => true,
            ]);
    }
}
