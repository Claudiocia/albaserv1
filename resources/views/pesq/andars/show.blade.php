<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dados da Assembleias Legislativa da Bahia') }}
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
                                <h5>Dados do Andar -- {{$andar->nome}} do Prédio {{$andar->ala->predio->nome}} @if($andar->ala->nome != 'Única') - Ala {{$andar->ala->nome}} @endif</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Voltar')->asLinkTo(route('pesq.andars.index'))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::primary('Editar')->asLinkTo(route('pesq.andars.edit', ['andar' => $andar->id]))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::danger('Delete')
                                            ->asLinkTo(route('pesq.andars.destroy', ['andar' => $andar->id]))
                                            ->addAttributes(['data-bs-toggle' => 'modal', 'class' => 'btn-teste', 'data-bs-target' => '#deleteModal'])
                                 !!}
                                    <?php $formDelete = FormBuilder::plain([
                                        'id' => 'form-delete',
                                        'route' => ['pesq.andars.destroy', 'andar' => $andar->id],
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
                                                    {{ $andar->ala->predio->alba->sigla }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Prédio</h6>
                                                <div class="texto-show">
                                                    {{ $andar->ala->predio->nome }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Andar / ALA</h6>
                                                <div class="texto-show">
                                                    @if($andar->ala->nome != 'Única') {{ $andar->nome }} -- {{ $andar->ala->nome }}@else {{ $andar->nome }} @endif
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


        </div>
    </div>

</x-app-layout>
