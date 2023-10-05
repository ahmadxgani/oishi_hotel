<?php
    $menus = [
        [
            'section' => 'Main Menu',
            'items' => [
                ['name' => 'dashboard', 'icon' => 'home', 'path' => 'admin.analytic'],
                ['name' => 'rooms & suites', 'icon' => 'layout', 'path' => 'admin.room.index'],
                ['name' => 'facilities', 'icon' => 'layers', 'path' => 'admin.facility.index'],
            ]
        ]
    ];
?>

<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="{{ asset('assets/images/logo.svg') }}" alt="" srcset="">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                @foreach ($menus as $menu)
                    <li class='sidebar-title'>{{ $menu['section'] }}</li>

                    @foreach ($menu['items'] as $item)
                    <li class="sidebar-item {{ (strcmp(Route::currentRouteName(), $item['path']) == 0) ? 'active' : '' }}">
                        <a href="{{ route($item['path']) }}" class='sidebar-link'>
                            <i data-feather="{{ $item['icon'] }}" width="20"></i>
                            <span>{{ ucwords($item['name']) }}</span>
                        </a>
                    </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
