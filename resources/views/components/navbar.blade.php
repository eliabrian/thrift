<div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a href="{{ route($menus['home']['route']) }}" class="navbar-brand">Thrift</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @guest
            @foreach ($menus as $key => $item)
            <li class="nav-item">
              <a href="{{ route($menus[$key]['route'])}}" class="nav-link">
                {{ $menus[$key]['name'] }}
              </a>
            </li>
            @endforeach
          @endguest

          @can('dashboard', auth()->user())
              @foreach ($admin as $key => $item)
              <li class="nav-item">
                <a href="{{ route($admin[$key]['route'])}}" class="nav-link">
                  {{ $admin[$key]['name'] }}
                </a>
              </li>
              @endforeach
          @endcan

          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('auth.logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
            </a>
             <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            </a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
</div>