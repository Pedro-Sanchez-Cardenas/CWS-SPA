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
                                @if ($com == Auth::user()->company->name)
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
                                            @include('panels/submenu', ['menu' => $submenu->submenu])
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endif
        @endforeach
    @endif
</ul>
