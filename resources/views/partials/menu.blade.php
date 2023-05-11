<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.setting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('urgency_access')
                            <li class="{{ request()->is("admin/urgencies") || request()->is("admin/urgencies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.urgencies.index") }}">
                                    <i class="fa-fw fas fa-exclamation">

                                    </i>
                                    <span>{{ trans('cruds.urgency.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('info_access')
                            <li class="{{ request()->is("admin/infos") || request()->is("admin/infos/*") ? "active" : "" }}">
                                <a href="{{ route("admin.infos.index") }}">
                                    <i class="fa-fw fas fa-info">

                                    </i>
                                    <span>{{ trans('cruds.info.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('client_type_access')
                            <li class="{{ request()->is("admin/client-types") || request()->is("admin/client-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.client-types.index") }}">
                                    <i class="fa-fw fas fa-user-friends">

                                    </i>
                                    <span>{{ trans('cruds.clientType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('surface_type_access')
                            <li class="{{ request()->is("admin/surface-types") || request()->is("admin/surface-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.surface-types.index") }}">
                                    <i class="fa-fw fas fa-equals">

                                    </i>
                                    <span>{{ trans('cruds.surfaceType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('client_access')
                <li class="{{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                    <a href="{{ route("admin.clients.index") }}">
                        <i class="fa-fw fas fa-user">

                        </i>
                        <span>{{ trans('cruds.client.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('budget_request_access')
                <li class="{{ request()->is("admin/budget-requests") || request()->is("admin/budget-requests/*") ? "active" : "" }}">
                    <a href="{{ route("admin.budget-requests.index") }}">
                        <i class="fa-fw fas fa-euro-sign">

                        </i>
                        <span>{{ trans('cruds.budgetRequest.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('contact_access')
                <li class="{{ request()->is("admin/contacts") || request()->is("admin/contacts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.contacts.index") }}">
                        <i class="fa-fw fas fa-file-contract">

                        </i>
                        <span>{{ trans('cruds.contact.title') }}</span>

                    </a>
                </li>
            @endcan
            <li class="{{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                <a href="{{ route("admin.systemCalendar") }}">
                    <i class="fas fa-fw fa-calendar">

                    </i>
                    <span>{{ trans('global.systemCalendar') }}</span>
                </a>
            </li>
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>