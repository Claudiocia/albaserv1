<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dados das Assembleias Legislativas do Brasil') }}
        </h2>
    </x-slot>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Dados da -- {{$alba->nome}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Voltar')->asLinkTo(route('admin.albas.index')) !!}
                                    {!! Button::primary('Editar')->asLinkTo(route('admin.albas.edit', ['alba' => $alba->id]))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::danger('Delete')
                                            ->asLinkTo(route('admin.albas.destroy', ['alba' => $alba->id]))
                                            ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();', 'class' => 'btn-teste'])
                                 !!}
                                    <?php $formDelete = FormBuilder::plain([
                                        'id' => 'form-delete',
                                        'route' => ['admin.albas.destroy', 'alba' => $alba->id],
                                        'method' => 'DELETE',
                                        'style' => 'display:none',
                                    ]); ?>
                                    {!! form($formDelete) !!}
                                </div>
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <div id="register-show">
                                        <div class="row bloco-div-show desk">
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Sigla</h6>
                                                <div class="texto-show">
                                                    {{ $alba->sigla }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Nome</h6>
                                                <div class="texto-show">
                                                    {{ $alba->nome }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Presidente</h6>
                                                <div class="texto-show">
                                                    {{ $alba->presid }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Telefone</h6>
                                                <div id="tel" class="texto-show">
                                                    <?php
                                                    $tel = $alba->tel;
                                                    $tels = explode("/", $tel);
                                                    ?>
                                                    @foreach($tels as $tel)
                                                    {{$tel}} /
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="endere">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Endereço</h6>
                                                <div class="texto-show">
                                                    {{ $alba->end }} - {{$alba->bairro}} - CEP: {{$alba->cep}} - {{$alba->cidade}}/{{$alba->uf}}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Site WEB</h6>
                                                <div class="texto-show">
                                                    {{ $alba->url }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">E-mail</h6>
                                                <div class="texto-show">
                                                    {{ $alba->email }}
                                                </div>
                                            </div>
                                            @if($alba->sigla == 'ALBA')
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">CNPJ</h6>
                                                <div id="cnpj" class="texto-show">
                                                    {{ $alba->cnpj }}
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</x-app-layout>
