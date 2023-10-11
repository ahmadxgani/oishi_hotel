<?php
$menus = [
    [
        'section' => 'Main Menu',
        'items' => [
            ['role' => 'admin', 'name' => 'dashboard', 'icon' => 'home', 'path' => 'admin.analytic'],
            ['role' => 'admin', 'name' => 'types of room', 'icon' => 'layout', 'path' => 'admin.type_room.index'],
            ['role' => 'admin', 'name' => 'facilities', 'icon' => 'layers', 'path' => 'admin.facility.index'],
            ['role' => 'admin', 'name' => 'the total of room', 'icon' => 'home', 'path' => 'admin.room.index'],
            ['role' => 'admin', 'name' => 'gallery', 'icon' => 'image', 'path' => 'admin.gallery.index'],
            ['role' => 'receptionist', 'name' => 'Booking Management', 'icon' => 'book-open', 'path' => 'admin.gallery.index'],
            ['role' => 'guest', 'name' => 'Reserve Room', 'icon' => 'briefcase', 'path' => 'booking_guest.create'],
            ['role' => 'guest', 'name' => 'Booking History', 'icon' => 'archive', 'path' => 'booking_guest.index']
        ],
    ],
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
                        @if (Auth::user()->role === $item['role'])
                            <li {{-- todo: use start with method instead of full path in order to make persistent active tab --}}
                                class="sidebar-item {{ strcmp(Route::currentRouteName(), $item['path']) == 0 ? 'active' : '' }}">
                                <a href="{{ route($item['path']) }}" class='sidebar-link'>
                                    <i data-feather="{{ $item['icon'] }}" width="20"></i>
                                    <span>{{ ucwords($item['name']) }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
