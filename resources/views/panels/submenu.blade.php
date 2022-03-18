{{-- For submenu --}}
<ul class="menu-content">
    @if (isset($menu))
        @foreach ($menu as $submenu)
            @if (isset($submenu->roles))
                @if (isset($submenu->companies))
                    @php
                        $roles = explode('|', $submenu->roles);
                        $company = explode('|', $submenu->companies);
                    @endphp
                    @foreach ($roles as $role)
                        @if ($role == Auth::user()->getRoleNames()['0'])
                            @foreach ($company as $com)
                                @if ($loop->first)
                                    @if (Auth::user()->getRoleNames()['0'] == 'Operator' || Auth::user()->getRoleNames()['0'] == 'Manager')
                                        @foreach (Auth::user()->companies as $userCompany)
                                            @if ($com == $userCompany->name)
                                                <li @if ($submenu->slug === Route::currentRouteName()) class="active" @endif>
                                                    <a href="{{ isset($submenu->url) ? route($submenu->url, $com) : 'javascript:void(0)' }}"
                                                        class="d-flex align-items-center"
                                                        target="{{ isset($submenu->newTab) && $submenu->newTab === true ? '_blank' : '_self' }}">
                                                        @if (isset($submenu->icon))
                                                            <i data-feather="{{ $submenu->icon }}"></i>
                                                        @endif
                                                        <span
                                                            class="menu-item text-truncate">{{ __('locale.' . $submenu->name) }}</span>
                                                    </a>
                                                    @if (isset($submenu->submenu))
                                                        @include('panels/submenu', [
                                                            'menu' => $submenu->submenu,
                                                        ])
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif


                                    @if (Auth::user()->getRoleNames()['0'] == 'Super-Admin')
                                        <li @if ($submenu->slug === Route::currentRouteName()) class="active" @endif>
                                            <a href="{{ isset($submenu->url) ? route($submenu->url, $com) : 'javascript:void(0)' }}"
                                                class="d-flex align-items-center"
                                                target="{{ isset($submenu->newTab) && $submenu->newTab === true ? '_blank' : '_self' }}">
                                                @if (isset($submenu->icon))
                                                    <i data-feather="{{ $submenu->icon }}"></i>
                                                @endif
                                                <span
                                                    class="menu-item text-truncate">{{ __('locale.' . $submenu->name) }}</span>
                                            </a>
                                            @if (isset($submenu->submenu))
                                                @include('panels/submenu', [
                                                    'menu' => $submenu->submenu,
                                                ])
                                            @endif
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach
    @endif
</ul>
