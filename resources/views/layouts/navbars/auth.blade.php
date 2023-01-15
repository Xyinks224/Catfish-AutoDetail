<div class="sidebar" data-color="black" data-active-color="danger">
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            <img src="{{ asset('paper') . '/' . ("img/logo-catfish.png") }}" alt="" height="40px">
        </a>
    </div>
    <div class="sidebar-wrapper">
        @can('isSuperadmin')
            <ul class="nav">
                <li class="{{ request()->is('superadmin/home') ? 'active' : '' }}">
                    <a href="{{ route('superadmin.home') }}">
                        <i class="nc-icon nc-globe"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li class="{{ request()->is('superadmin/auto-detail/home') ? 'active' : '' }}">
                    <a href="{{ route('superadmin.auto-detail.home') }}">
                        <i class="nc-icon nc-diamond"></i>
                        <p>{{ __('Auto Detailing') }}</p>
                    </a>
                </li>
                <li class="{{ request()->is('superadmin/auto-detail-form*') ? 'active' : '' }}">
                    <a aria-expanded="true" href="" data-toggle="collapse" onclick="window.location='{{ route('superadmin.form.home') }}'">
                        <i class="nc-icon nc-paper"></i>
                        <p>
                            {{ __('Form Auto Detailing') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse show">
                        {{-- <ul class="nav">
                            <li class="{{ request()->is('superadmin/auto-detail-form/vehicle-received') ? 'active' : '' }}">
                                <a href="{{ route('superadmin.form.vehicle.received') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('o') }}</span>
                                    <span class="sidebar-normal">{{ __(' Kendaraan Diterima ') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('superadmin/auto-detail-form/invoice-dp') ? 'active' : '' }}">
                                <a href="{{ route('superadmin.form.invoice.dp') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('o') }}</span>
                                    <span class="sidebar-normal">{{ __(' Invoice DP ') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('superadmin/auto-detail-form/vehicle-inspection') ? 'active' : '' }}">
                                <a href="{{ route('superadmin.form.vehicle.inspection') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('o') }}</span>
                                    <span class="sidebar-normal">{{ __(' Inspeksi Kendaraan ') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('superadmin/auto-detail-form/warrant') ? 'active' : '' }}">
                                <a href="{{ route('superadmin.form.warrant') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('o') }}</span>
                                    <span class="sidebar-normal">{{ __(' SPK Pekerjaan ') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('superadmin/auto-detail-form/invoice-payment') ? 'active' : '' }}">
                                <a href="{{ route('superadmin.form.invoice.payment') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('o') }}</span>
                                    <span class="sidebar-normal">{{ __(' Invoice Pelunasan ') }}</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('superadmin/auto-detail-form/vehicle-delivery') ? 'active' : '' }}">
                                <a href="{{ route('superadmin.form.vehicle.delivery') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('o') }}</span>
                                    <span class="sidebar-normal">{{ __(' Kendaraan Diserahkan ') }}</span>
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </li>
                <li class="{{ request()->is('superadmin/product*') ? 'active' : '' }}">
                    <a href="{{ route('superadmin.product.index') }}">
                        <i class="nc-icon nc-box-2"></i>
                        <p>{{ __('Product') }}</p>
                    </a>
                </li>
                <li class="{{ request()->is('superadmin/crew*') ? 'active' : '' }}">
                    <a href="{{ route('superadmin.crew.index') }}">
                        <i class="fa fa-user-circle"></i>
                        <p>{{ __('Crew') }}</p>
                    </a>
                </li>
                <li class="{{ request()->is('superadmin/customer*') ? 'active' : '' }}">
                    <a href="{{ route('superadmin.customer.index') }}">
                        <i class="fa fa-user"></i>
                        <p>{{ __('User') }}</p>
                    </a>
                </li>
                <li >
                    <a href="{{ route('page.index', 'typography') }}">
                        <i class="nc-icon nc-cart-simple"></i>
                        <p>{{ __('Transaction') }}</p>
                    </a>
                </li>
            </ul>
        @endcan
        @can('isAdmin')
            <ul class="nav">
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="nc-icon nc-globe"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
                <li >
                    <a href="{{ route('page.index', 'icons') }}">
                        <i class="nc-icon nc-diamond"></i>
                        <p>{{ __('Auto Detailing') }}</p>
                    </a>
                </li>
                <li >
                    <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                        <i class="nc-icon nc-paper"></i>
                        <p>
                                {{ __('Form Autodetailing') }}
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse show" id="laravelExamples">
                        <ul class="nav">
                            <li >
                                <a href="{{ route('profile.edit') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('U') }}</span>
                                    <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                                </a>
                            </li>
                            <li >
                                <a href="{{ route('page.index', 'user') }}">
                                    <span class="sidebar-mini-icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ __('U') }}</span>
                                    <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li >
                    <a href="{{ route('page.index', 'map') }}">
                        <i class="nc-icon nc-pin-3"></i>
                        <p>{{ __('Product') }}</p>
                    </a>
                </li>
                <li >
                    <a href="{{ route('page.index', 'notifications') }}">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>{{ __('Crew') }}</p>
                    </a>
                </li>
                <li >
                    <a href="{{ route('page.index', 'tables') }}">
                        <i class="nc-icon nc-tile-56"></i>
                        <p>{{ __('User') }}</p>
                    </a>
                </li>
                <li >
                    <a href="{{ route('page.index', 'typography') }}">
                        <i class="nc-icon nc-caps-small"></i>
                        <p>{{ __('Transaction') }}</p>
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</div>
