<div>
    <button wire:click.prevent="create"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-4 ml-4 py-2 px-4 rounded">
        Novo IoT
    </button>

    <table class="table min-w-full mt-4">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">#</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Cliente</th>
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
                    {{ $device->identificador }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    {{ $device->data_ativacao }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                    <button
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"
                        wire:click.prevent="edit({{ $device->id }})">Editar
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


    <div
        class="@if (!$showModal) hidden @endif flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
        <div class="bg-white rounded-lg w-1/2">
            <form wire:submit.prevent="save" class="w-full">
                <div class="flex flex-col items-start p-4">
                    <div class="flex items-center w-full border-b pb-4">
                        <div class="text-gray-900 font-medium text-lg">{{ $deviceId ? 'Editar IoT' : 'Novo IoT' }}</div>
                        <svg wire:click="close"
                             class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                        </svg>
                    </div>
                    <div class="w-full">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Cliente
                        </label>
                        <input wire:model.defer="device.cliente"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-800 w-full py-2 focus:outline-none focus:border-blue-400"/>
                    </div>
                    <div class="py-4 border-b w-full mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="title">
                            Nome do Projeto
                        </label>
                        <input wire:model.defer="device.nome"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-800 w-full py-2 focus:outline-none focus:border-blue-400"/>
                    </div>
                    <div class="py-4 border-b mb-4 w-64">
                        <label class="block font-medium text-sm text-gray-700" for="title form-control datepicker">
                            Data de Ativação
                        </label>
                        <input wire:model.defer="device.data_ativacao"
                               class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-800 w-full py-2 focus:outline-none focus:border-blue-400"/>
                    </div>

                    <div class="ml-auto">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">{{ $deviceId ? 'Salva alterações' : 'Salvar' }}
                        </button>
                        <button class="bg-gray-500 text-white font-bold py-2 px-4 rounded"
                                wire:click="close"
                                type="button"
                                data-dismiss="modal">Fechar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
