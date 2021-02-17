@php
$links = [
    [
        "text" => "Painel",
        "is_multi" => false,
        "href" => "dashboard",
        "icon" => "fas fa-desktop",
    ],
    [
        "text" => "Dispositivos",
        "is_multi" => false,
        "href" => "devices.index",
        "icon" => "fas fa-microchip",
    ],
    [
        "text" => "Gerenciamento",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Usuários",
                "section_icon" => "fas fa-users",
                "section_list" => [
                    ["href" => "user", "text" => "Usuários"],
                    ["href" => "user.new", "text" => "Novo Usuário"]
                ]
            ]
        ],

    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">IoT Manager</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="32px" src="{{ asset("img/iotmanager.png") }}" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="{{ $link->icon }}"></i><span>{{ $link->text }}</span></a>
            </li>
            @else
                <li class="menu-header">{{ $link->text }}</li>
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        {{-- <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-bar"></i> <span>{{ $section->section_text }}</span></a> --}}
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->section_icon }}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
