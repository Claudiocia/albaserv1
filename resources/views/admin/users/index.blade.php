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
                                <h5>Novo Usuário</h5>
                                <div class="form-search">
                                    <form action="{{ route('admin.users.index') }}" method="get">
                                        <label class="label-search">Pesquisar</label>
                                        <x-jet-input id="search" class="mt-1 w-full" type="search" name="search"/>
                                        <div class="buton-search">
                                            <x-jet-button class="ml-4 buton-sch">
                                                {{ __('Pesquisar') }}
                                            </x-jet-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Novo')->asLinkTo(route('admin.users.create')) !!}
                                    {!! Button::primary('Limpar')->asLinkTo(route('admin.users.index'))->addClass(['class' => 'btn-teste']) !!}
                                </div>
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    {!!
                                        Table::withContents($users)->striped()
                                        ->callback('Actions', function ($field, $user){
                                            $linkEdit = route('admin.users.edit', ['user' => $user->id]);
                                            $linkShow = route('admin.users.show', ['user' => $user->id]);
                                            $linkRole = route('admin.users.rolerel', ['user' => $user->id]);
                                            return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                            \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow)." | ".
                                            \Bootstrapper\Facades\Button::LINK('<i class="fas fa-user"></i>')->asLinkTo($linkRole);
                                        })
                                    !!}
                                </div>
                            </div>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>


        </div>
    </div>

</x-app-layout>
