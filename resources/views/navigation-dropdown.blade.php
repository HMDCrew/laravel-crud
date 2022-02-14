
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark ps bg-white" id="sidenav-main">

    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ route('dashboard') }}" target="_blank">
        <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">{{ config('app.name', 'Laravel') }}</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">

    <!-- Navigation Links -->
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link text-white {{ (request()->routeIs('dashboard') ? 'bg-gradient-danger active' : '')  }}" href="{{ route('dashboard') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text ms-1">{{ __('Dashboard') }}</span>
            </a>
        </li>

        @can('user_access')
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#dashboardsExamples"
                    class="nav-link text-white {{ item_active(request(), ['users.*', 'roles.*', 'permission.*'], 'active' ) }}"
                    aria-controls="dashboardsExamples" role="button"
                    aria-expanded="{{ item_active(request(), ['users.*', 'roles.*'], 'true' ) }}">

                    <i class="material-icons-round opacity-10">person</i>
                    <span class="nav-link-text ms-2 ps-1">Users</span>
                </a>
                <div class="collapse {{ item_active(request(), ['users.*', 'roles.*', 'permission.*'], 'show' ) }}" id="dashboardsExamples" style="">
                    <ul class="nav ">
                      <li class="nav-item">
                        <a class="nav-link text-white {{ item_active(request(), ['users.*'], 'bg-gradient-danger active')  }}" href="{{ route('users.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="material-icons opacity-10">people_outline</i>
                            </div>
                            <span class="nav-link-text ms-1">{{ __('Manage users') }}</span>
                        </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link text-white {{ item_active(request(), ['roles.*'], 'bg-gradient-danger active') }}" href="{{ route('roles.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="material-icons opacity-10">tag</i>
                            </div>
                            <span class="nav-link-text ms-1">{{ __('Roles') }}</span>
                          </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link text-white {{ item_active(request(), ['permission.*'], 'bg-gradient-danger active') }}" href="{{ route('permission.index') }}">
                            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                              <i class="material-icons opacity-10">lock</i>
                            </div>
                            <span class="nav-link-text ms-1">{{ __('Permission') }}</span>
                          </a>
                      </li>
                    </ul>
                </div>
            </li>
        @endcan
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-danger mt-4 w-100" href="{{ route('prof') }}">
                <span class="nav-link-text ms-1">{{ __('Profile') }}</span>
            </a>
        </div>
    </div>
  </aside>
