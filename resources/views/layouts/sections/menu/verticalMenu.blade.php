<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{config('variables.templateName')}}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">

    @foreach ($menuData[0]->menu as $menu)

      {{-- adding active and open class if child is active --}}

      {{-- menu headers --}}
      @if (isset($menu->menuHeader))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ __($menu->menuHeader) }}</span>
        </li>
      @else

      {{-- active menu method --}}
      @php
      $activeClass = null;
      $currentRouteName = Route::currentRouteName();
      if ($currentRouteName === $menu->slug) {
    $activeClass = 'active';
      }
      elseif (isset($menu->submenu)) {
          if (is_array($menu->submenu)) {
              foreach ($menu->submenu as $slug) {
                  if (str_starts_with($currentRouteName, $slug->slug)) {
                      $activeClass = 'active open';
                      break;
                  }
              }
          } else {
              if (str_starts_with($currentRouteName, $menu->slug)) {
                  $activeClass = 'active open';
              }
          }
      }

      @endphp

      {{-- main menu --}}
      <li class="menu-item {{$activeClass}}">
        <a  class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}" @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
          @isset($menu->icon)
            <i class="{{ $menu->icon }}"></i>
          @endisset
          <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
          @isset($menu->badge)
            <div class="badge rounded-pill bg-{{ $menu->badge[0] }} text-uppercase ms-auto">{{ $menu->badge[1] }}</div>
          @endisset
        </a>

        {{-- submenu --}}
        @isset($menu->submenu)
          @include('layouts.sections.menu.submenu',['menu' => $menu->submenu])
        @endisset
      </li>
      @endif
    @endforeach
  </ul>

</aside>
