<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>
                @if (auth()->user()->hasRole('admin'))
                <li>
                    <a href="{{ url('/admin') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                </li>
                @elseif (auth()->user()->hasRole('agency'))
                <li>
                    <a href="{{ url('/agency') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                @elseif (auth()->user()->hasRole('agent'))
                <li>
                    <a href="{{ url('/agent') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                @else
                <li>
                    <a href="{{ url('/user') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                </li>
                @endif

                @if (!auth()->user()->hasRole('agency') && !auth()->user()->hasRole('admin'))

                <li>
                    <a href="chat" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span key="t-chat">Chat</span>
                    </a>
                </li>
                @else
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span key="t-chat">@lang('translation.Campaigns')</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasRole('user'))
                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-building"></i>
                        <span key="t-chat">@lang('translation.Followed_Agnecies')</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasAnyRole('agency|admin'))
                <li>
                    <a href="{{ route('agency.agents') }}" class="waves-effect">
                        <i class="dripicons-user-group"></i>
                        <span key="t-chat">@lang('translation.Agents')</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
