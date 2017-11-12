@if(false)
    5.4 sidebar======
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
                </div><!--pull-left-->
                <div class="pull-left info">
                    <p>{{ access()->user()->full_name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
                </div><!--pull-left-->
            </div><!--user-panel-->

            <!-- search form (Optional) -->
            {{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}
            <div class="input-group">
                {{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}

                <span class="input-group-btn">
                    <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span><!--input-group-btn-->
            </div><!--input-group-->
        {{ Form::close() }}
        <!-- /.search form -->
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>
                <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                    </a>
                </li>
                <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>
                {{xdebug_break()}}
                @can('confirm users')
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>{{ trans('menus.backend.access.title') }}</span>

                            @if ($pending_approval > 0)
                                <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                            @else
                                <i class="fa fa-angle-left pull-right"></i>
                            @endif
                        </a>

                        <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                            <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                                <a href="{{ route('admin.access.user.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>{{ trans('labels.backend.access.users.management') }}</span>

                                    @if ($pending_approval > 0)
                                        <span class="label label-danger pull-right">{{ $pending_approval }}</span>
                                    @endif
                                </a>
                            </li>
                            @can('manage roles')
                                <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                                    <a href="{{ route('admin.access.role.index') }}">
                                        <i class="fa fa-circle-o"></i>
                                        <span>{{ trans('labels.backend.access.roles.management') }}</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                    <a href="#">
                        <i class="fa fa-list"></i>
                        <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        =======
                        @endif
                        <div class="sidebar">
                            <nav class="sidebar-nav">
                                <ul class="nav">
                                    <li class="nav-title">
                                        {{ __('menus.backend.sidebar.general') }}
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
                                    </li>

                                    <li class="nav-title">
                                        {{ __('menus.backend.sidebar.system') }}
                                    </li>

                                    @can('authorize users')
                                        <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                                            <a class="nav-link nav-dropdown-toggle" href="#">
                                                <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                                                @if ($pending_approval > 0)
                                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                                @endif
                                            </a>

                                            <ul class="nav-dropdown-items">
                                                <li class="nav-item">
                                                    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                                        {{ __('labels.backend.access.users.management') }}

                                                        @if ($pending_approval > 0)
                                                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                                                        @endif
                                                    </a>
                                                </li>
                                                @can('manage roles')
                                                    <li class="nav-item">
                                                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                                            {{ __('labels.backend.access.roles.management') }}
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                                    @endcan

                                    <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                                        <a class="nav-link nav-dropdown-toggle" href="#">
                                            <i class="icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                                        </a>

                                        <ul class="nav-dropdown-items">
                                            <li class="nav-item">
                                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                                                    {{ __('menus.backend.log-viewer.dashboard') }}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                                                    {{ __('menus.backend.log-viewer.logs') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                @if(false)
                                    <<<<<<< HEAD
        </section>
    </aside>
    =======
    @endif
    </nav>
    </div><!--sidebar-->
