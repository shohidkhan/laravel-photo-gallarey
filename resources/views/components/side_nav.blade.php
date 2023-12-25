<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
      <!-- Dark Logo-->
      <a href="index.html" class="logo logo-dark">
        <span class="logo-sm">
         <h2>E-com</h2>
        </span>
        <span class="logo-lg">
          <h2>E-com</h2>
        </span>
      </a>
      <!-- Light Logo-->
      <a href="index.html" class="logo logo-light">
        <span class="logo-sm">
          <img src="{{ asset('assets/backend') }}/images/logo-sm.png" alt="" height="22" />
        </span>
        <span class="logo-lg">
          <img src="{{ asset('assets/backend') }}/images/logo-light.png" alt="" height="17" />
        </span>
      </a>
      <button
        type="button"
        class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
        id="vertical-hover"
      >
        <i class="ri-record-circle-line"></i>
      </button>
    </div>

    <div id="scrollbar">
      <div class="container-fluid">
        <div id="two-column-menu"></div>
        <ul class="navbar-nav" id="navbar-nav">
          <li class="menu-title"><span data-key="t-menu">Menu</span></li>
          <li class="nav-item">
            <a
              class="nav-link menu-link"
              href="#sidebarDashboards"
              data-bs-toggle="collapse"
              role="button"
              aria-expanded="false"
              aria-controls="sidebarDashboards"
            >
              <i data-feather="home" class="icon-dual"></i>
              <span data-key="t-dashboards">Dashboards</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarDashboards">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a
                    href="{{ route('admin.home') }}"
                    class="nav-link"
                    data-key="t-analytics"
                  >
                    Home
                  </a>
                </li>
                
              </ul>
            </div>
          </li>
          <!-- end Dashboard Menu -->
          <li class="nav-item">
            <a
              class="nav-link menu-link"
              href="#sidebarApps"
              data-bs-toggle="collapse"
              role="button"
              aria-expanded="false"
              aria-controls="sidebarApps"
            >
              <i data-feather="grid" class="icon-dual"></i>
              <span data-key="t-apps">Photos Gallarey</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarApps">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a
                    href="{{ route("admin.albums.index") }}"
                    class="nav-link"
                  >
                    Album
                  </a>
                  
                </li>
              </ul>
            </div>
          </li>

          
        </ul>
      </div>
      <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
  </div>
  <!-- Left Sidebar End -->