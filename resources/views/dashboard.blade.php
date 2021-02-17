<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Dashboard') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">{{ __('Dashboard') }}</a></div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <x-jet-welcome />
    </div>
</x-app-layout>
