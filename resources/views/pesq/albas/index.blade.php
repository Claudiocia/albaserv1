<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Relação de Assembleias Legislativas do Brasil') }}
        </h2>
    </x-slot>
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <div id="admin-content">
            <div class="container-admin">
                <div class="row">
                    <div class="col-md-12">
                        <div class="w-auto p-3">
                            <div class="panel-heading-admin">
                                <h5>Assembleia Legislativa</h5>
                                <div class="form-search">
                                    <form action="{{ route('pesq.albas.index') }}" method="get">
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
                                    {!! Button::primary('Novo')->asLinkTo(route('pesq.albas.create')) !!}
                                    {!! Button::primary('Limpar')->asLinkTo(route('pesq.albas.index'))->addClass(['class' => 'btn-teste']) !!}
                                </div>
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    {!!
                                        Table::withContents($albas)->striped()
                                        ->callback('Actions', function ($field, $alba){
                                            $linkEdit = route('pesq.albas.edit', ['alba' => $alba->id]);
                                            $linkShow = route('pesq.albas.show', ['alba' => $alba->id]);
                                            return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                            \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                        })
                                    !!}
                                </div>
                            </div>
                        </div>
                        {{ $albas->links() }}
                    </div>
                </div>
            </div>


        </div>
    </div>

</x-app-layout>
