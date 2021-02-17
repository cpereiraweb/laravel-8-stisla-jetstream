<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Dispositivos') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></div>
            <div class="breadcrumb-item">Dispositivos</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div>
              <a
              class="inline-block mt-4 ml-4 px-4 py-2 rounded-lg transform transition bg-blue-500 hover:bg-blue-400 hover:-translate-y-0.5 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none focus:ring focus:ring-offset-2 active:bg-blue-600 uppercase tracking-wider font-semibold text-sm text-white shadow-lg sm:text-base"
              href="{{ route('devices.create') }}"><i class="fas fa-plus"></i> Novo IoT</a>
            <table class="table min-w-full mt-4">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">#</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Cliente</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Projeto</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Device</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Data Ativação</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"></th>
                </tr>
                </thead>
                <tbody>
                @forelse ($devices as $device)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            {{ $device->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            {{ $device->cliente }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            {{ $device->nome }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            {{ $device->identificador }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            {{ $device->data_ativacao->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                            <button
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                                rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray
                                disabled:opacity-25 transition ease-in-out duration-150">Editar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Sem registros</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="m-4">
                {{ $devices->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
