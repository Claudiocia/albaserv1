<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class AlbaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('chave', 'text', [
                'label' => 'Chave',
                'value' => 'ASSEMBLEIAS LEGISLATIVAS DO BRASIL',
            ])
            ->add('sigla', 'text', [
                'label' => 'Sigla',
            ])
            ->add('nome', 'text', [
                'label' => 'Nome',
            ])
            ->add('presid', 'text', [
                'label' => 'Presidente',
            ])
            ->add('end', 'text', [
                'label' => 'Endereço',
            ])
            ->add('bairro', 'text', [
                'label' => 'Bairro',
            ])
            ->add('cep', 'text', [
                'label' => 'CEP'
            ])
            ->add('cidade', 'text',[
                'label' => 'Cidade',
            ])
            ->add('uf', 'text', [
                'label' => 'UF',
            ])
            ->add('tel', 'text', [
                'label' => 'Telefone',
                'attr' => ['id' => 'tel_fixo']
            ])
            ->add('cnpj', 'text', [
                'label' => 'CNPJ',
            ])
            ->add('url', 'text', [
                'label' => 'Site',
            ])
            ->add('email', 'text', [
                'label' => 'Email',
            ]);
    }
}
