<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Edição de Unidade de Predio') }}
        </h2>
    </x-slot>
    <div class="col-md-12">
        <div class="card shadow bg-light">
            @include('layouts.menu-pesq')
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Editar -- {{$ambiente->nome}} </h5>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Voltar')->asLinkTo(route('pesq.ambientes.index'))->addClass(['class' => 'btn-teste']) !!}
                                </div>
                                <div class="form-admin">
                                    <?php $icon = '<i class="fas fa-save"></i>'; ?>
                                        {!!
                                            form($form->add('salvar', 'submit', [
                                                'attr' => ['class' => 'btn btn-primary btn-block btn-teste', 'style' => 'width:120px'],
                                                'label' => $icon.' Salvar'
                                             ]))
                                     !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pesq.ambientes.scriptes')
</x-app-layout>
