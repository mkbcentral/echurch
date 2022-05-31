<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{setting('app_logo_url')==null? asset('image.jpg'):asset('storage/'.setting('app_logo_url')) }}" id="logoImage"
        alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{setting('name_app')}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.dashboard.main') }}" class="nav-link {{ Route::is('admin.dashboard.main') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.church.management') }}" class="nav-link {{ Route::is('admin.church.management','admin.church.preaching.management','admin.event.management') ? 'active' : '' }}">
              <i class="{{ Route::is('admin.church.preaching.management') ? 'fa fa-microphone' : 'fa fa-home' }} " aria-hidden="true"></i>
              <p>
                Church management
              </p>
            </a>
          </li>
          
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ Route::is('admin.settings') ? 'active' : '' }} ">
                <i class="fas fa-cogs"></i>
              <p>
               Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.profile') }}" class="nav-link {{ Route::is('user.profile') ? 'active' : '' }} ">
                <i class="fa fa-user" aria-hidden="true"></i>
              <p>
                My profile
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
