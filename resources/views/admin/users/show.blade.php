<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Relação de usuários cadastrados no sistema') }}
        </h2>
    </x-slot>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Dados do usuário -- {{$user->name}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Voltar')->asLinkTo(route('admin.users.index')) !!}
                                    {!! Button::primary('Editar')->asLinkTo(route('admin.users.edit', ['user' => $user->id]))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::danger('Delete')
                                            ->asLinkTo(route('admin.users.destroy', ['user' => $user->id]))
                                            ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();', 'class' => 'btn-teste'])
                                 !!}
                                    <?php $formDelete = FormBuilder::plain([
                                        'id' => 'form-delete',
                                        'route' => ['admin.users.destroy', 'user' => $user->id],
                                        'method' => 'DELETE',
                                        'style' => 'display:none',
                                    ]); ?>
                                    {!! form($formDelete) !!}
                                </div>
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <div id="register-show">
                                        <div class="row bloco-div-show desk">
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Cadastro</h6>
                                                <div class="texto-show">
                                                    {{ $user->cadastro }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Nome</h6>
                                                <div class="texto-show">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">E-mail</h6>
                                                <div class="texto-show">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">CPF</h6>
                                                <div id="cpf" class="texto-show">
                                                    {{ $user->cpf }}
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Lotação</h6>
                                                <div class="texto-show">
                                                    @if($user->depart == null)
                                                        Visitante
                                                    @else
                                                    {{ $user->depart->nome }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="nome">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Função no sistema</h6>
                                                <div id="cpf" class="texto-show">
                                                    @switch($user->role)
                                                        @case(1)
                                                            {{ __('Visitante') }}
                                                        @break
                                                        @case(2)
                                                            {{ __('Administrador') }}
                                                        @break
                                                        @case(3)
                                                            {{ __('Depart Pesquisa') }}
                                                        @break
                                                    @endswitch
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
