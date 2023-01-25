<div class="card-body bg-blue px-5 py-3 border-bottom rounded-top">
    <div class="mx-3 my-3">
        <h3 class="h3 my-4 font-branc">
            Administração do Informativo
        </h3>
    </div>
    <!-- inserção do menu Pesquisa -->

    <nav class="navbar navbar-expand-md navbar-light bg-blue border-bottom sticky-top">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <x-jet-nav-link href="{{ route('pesq.dashboard-pesq') }}" :active="request()->routeIs('pesq.dashboard-pesq')" class="font-branc">
                        {{ __('Home Pesquisa') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('pesq.albas.index') }}" :active="request()->routeIs('pesq.albas.index')" class="font-branc">
                        {{ __('Assembleias') }}
                    </x-jet-nav-link>
                    <x-jet-dropdown id="settingsDropdown" class="font-branc">
                        <x-slot name="trigger">
                                Estrutura ALBA
                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                        </x-slot>
                        <x-slot name="content">
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Gerenciar Estrutura') }}
                            </h6>
                            <x-jet-dropdown-link href="{{ route('pesq.predios.index') }}">
                                {{ __('Predios') }}
                            </x-jet-dropdown-link>
                            <hr class="dropdown-divider">
                            <x-jet-dropdown-link href="{{route('pesq.alas.index')}}">
                                {{ __('Alas') }}
                            </x-jet-dropdown-link>
                            <hr class="dropdown-divider">
                            <x-jet-dropdown-link href="{{route('pesq.andars.index')}}">
                                {{ __('Andares') }}
                            </x-jet-dropdown-link>
                            <hr class="dropdown-divider">
                            <x-jet-dropdown-link href="{{route('pesq.ambientes.index')}}">
                                {{ __('Unidades') }}
                            </x-jet-dropdown-link>

                        </x-slot>
                    </x-jet-dropdown>

                    <x-jet-nav-link href="#" :active="request()->routeIs('')" class="font-branc">
                        {{ __('Novo Link') }}
                    </x-jet-nav-link>
                </ul>
            </div>
        </div>
    </nav>

    <!-- FIM do menu Pesquisa -->
</div>
