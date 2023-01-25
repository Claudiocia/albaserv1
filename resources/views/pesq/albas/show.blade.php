<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dados das Assembleias Legislativas do Brasil') }}
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
                                <h5>Dados da -- {{$alba->nome}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Voltar')->asLinkTo(route('pesq.albas.index'))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::primary('Editar')->asLinkTo(route('pesq.albas.edit', ['alba' => $alba->id]))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::danger('Delete')
                                            ->asLinkTo(route('pesq.albas.destroy', ['alba' => $alba->id]))
                                            ->addAttributes(['data-bs-toggle' => 'modal', 'class' => 'btn-teste', 'data-bs-target' => '#deleteModal'])
                                 !!}
                                    <?php $formDelete = FormBuilder::plain([
                                        'id' => 'form-delete',
                                        'route' => ['pesq.albas.destroy', 'alba' => $alba->id],
                                        'method' => 'DELETE',
                                        'style' => 'display:none',
                                    ]); ?>
                                    {!! form($formDelete) !!}
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span class="aviso">Confirme sua ação</span></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <span class="aviso">Você tem certeza que deseja deletar o registro?</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('form-delete').submit();">Deletar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
