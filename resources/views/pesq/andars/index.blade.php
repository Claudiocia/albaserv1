<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Gerenciamento dos Andares da ALBA') }}
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
                                <h5>Assembleia Legislativa</h5>
                                <div class="form-search">
                                    <form action="{{ route('pesq.andars.index') }}" method="get">
                                        <label class="label-search">Pesquisar</label>
                                        <x-jet-input id="search" class="mt-1 w-full" type="search" name="search"/>
                                        <div class="buton-search">
                                            <x-jet-button class="ml-4 buton-sch btn-teste">
                                                {{ __('Pesquisar') }}
                                            </x-jet-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row btn-new-reset">
                                    {!! Button::primary('Novo')->asLinkTo(route('pesq.andars.create'))->addClass(['class' => 'btn-teste']) !!}
                                    {!! Button::primary('Limpar')->asLinkTo(route('pesq.andars.index'))->addClass(['class' => 'btn-teste']) !!}
                                </div>
                                <div class="row" style="margin-left: 10px; margin-right: 10px;">
                                    {!!
                                        Table::withContents($andars)->striped()
                                        ->callback('Actions', function ($field, $andar){
                                            $linkEdit = route('pesq.andars.edit', ['andar' => $andar->id]);
                                            $linkShow = route('pesq.andars.show', ['andar' => $andar->id]);
                                            return \Bootstrapper\Facades\Button::LINK('<i class="fas fa-pencil-alt"></i>')->asLinkTo($linkEdit)." | ".
                                            \Bootstrapper\Facades\Button::LINK('<i class="fas fa-eye"></i>')->asLinkTo($linkShow);
                                        })
                                    !!}
                                </div>
                            </div>
                        </div>
                        {{ $andars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
