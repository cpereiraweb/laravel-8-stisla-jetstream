<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Dispositivos') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></div>
            <div class="breadcrumb-item">Dispositivos</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <livewire:devices />
    </div>
</x-app-layout>
