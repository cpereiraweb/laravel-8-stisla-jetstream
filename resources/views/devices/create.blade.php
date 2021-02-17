<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Novo IoT') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('devices.index') }}">Dispositivos</a></div>
            <div class="breadcrumb-item">Novo IoT</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="w-2/3">
            <form method="POST" action="{{ route('devices.store') }}">
                @csrf
                <div class="flex flex-row items-start pt-4 pl-4 pr-4">
                    <div class="w-96 mr-4">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Cliente
                        </label>
                        <input type="text" name="cliente" value="{{ old('cliente', '') }}" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-800 w-full py-2 focus:outline-none focus:border-blue-400"/>
                        @if ($errors->has('cliente'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $errors->first('cliente') }}
                        </span>
                        @endif
                    </div>
                    <div class="w-96 mr-4">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Nome do Projeto
                        </label>
                        <input type="text" name="nome" value="{{ old('nome', '') }}" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-800 w-full py-2 focus:outline-none focus:border-blue-400"/>
                        @if ($errors->has('nome'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $errors->first('nome') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-row items-start pt-2 pl-4 pr-4 pb-4">
                    <div class="w-96 mr-4">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Descrição
                        </label>
                        <input type="text" name="descricao" value="{{ old('descricao', '') }}" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-800 w-full py-2 focus:outline-none focus:border-blue-400"/>
                        @if ($errors->has('descricao'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $errors->first('descricao') }}
                        </span>
                        @endif
                    </div>
                    <div class="w-48">
                        <label class="block font-medium text-sm text-gray-700" for="title form-control datepicker">
                            Data de Ativação
                        </label>
                        <input type="date" placeholder="dd/mm/aaaa" name="data_ativacao" value="{{ old('data_ativacao', '') }}" class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border {{ $errors->has('data_ativacao') ? 'border-red-500' : ' border-gray-800' }} w-full py-2 focus:outline-none focus:border-blue-400"/>
                        @if ($errors->has('data_ativacao'))
                        <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                            {{ $errors->first('data_ativacao') }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-row items-start p-4">
                    <div class="ml-2">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
