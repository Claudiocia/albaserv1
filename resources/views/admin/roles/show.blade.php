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
                                <h5>Dados da -- {{$role->system}}</h5>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Voltar')->asLinkTo(route('admin.roles.index')) !!}
                                    {!! Button::primary('Editar')->asLinkTo(route('admin.roles.edit', ['role' => $role->id]))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::danger('Delete')
                                            ->asLinkTo(route('admin.roles.destroy', ['role' => $role->id]))
                                            ->addAttributes(['onclick' => 'event.preventDefault();document.getElementById("form-delete").submit();', 'class' => 'btn-teste'])
                                 !!}
                                    <?php $formDelete = FormBuilder::plain([
                                        'id' => 'form-delete',
                                        'route' => ['admin.roles.destroy', 'role' => $role->id],
                                        'method' => 'DELETE',
                                        'style' => 'display:none',
                                    ]); ?>
                                    {!! form($formDelete) !!}
                                </div>
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    <div id="register-show">
                                        <div class="row bloco-div-show desk">
                                            <div class="endere">
                                                <h6 class="block font-medium text-sm text-gray-700 label-show">Nome do sistema</h6>
                                                <div class="texto-show">
                                                    {{ $role->system }}
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
