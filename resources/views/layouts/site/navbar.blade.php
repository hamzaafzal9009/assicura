<header id="page-topbar">
    <div class="container navbar-header">
        <div class="d-flex">
            <div class="navbar-brand">
                <a href="index" class="logo logo-dark">
                    <img src="{{ URL::asset('/assets/images/logo.png') }}" alt="" height="35">
                </a>
            </div>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @switch(Session::get('lang'))

                        @case('it')
                            <img src="{{ URL::asset('/assets/images/flags/italy.jpg') }}" alt="Header Language"
                                height="16"> <span class="align-middle">Italian</span>
                        @break
                        @default
                            <img src="{{ URL::asset('/assets/images/flags/us.jpg') }}" alt="Header Language" height="16">
                            <span class="align-middle">English</span>
                    @endswitch
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="{{ url('lang/en') }}" class="dropdown-item notify-item language" data-lang="eng">
                        <img src="{{ URL::asset('/assets/images/flags/us.jpg') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">English</span>
                    </a>
                    <a href="{{ url('lang/it') }}" class="dropdown-item notify-item language" data-lang="it">
                        <img src="{{ URL::asset('/assets/images/flags/italy.jpg') }}" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">Italian</span>
                    </a>
                </div>
            </div>

            @if (Auth::check())
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                            src="{{ isset(Auth::user()->avatar) ? asset('storage/'.Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}"
                            alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1"
                            key="t-henry">{{ ucfirst(Auth::user()->name) }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">

                        <a class="dropdown-item text-danger" href="javascript:void();"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                key="t-logout">@lang('translation.Logout')</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="btn btn-  d-inline-block align-self-center">@lang('translation.Login')</a>
                {{-- <a href=s="btn btn-text d-inline-block align-self-center">@lang('translation.Register')</a> --}}
            @endif
        </div>
    </div>
</header>
