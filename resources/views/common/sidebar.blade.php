<!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('image/deped-logo-kagawaran-ng-edukasyon.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DEPED DAVNOR</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('image/user_image.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a  class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (Auth::user()->hasRole('admin'))
                    <li class="nav-item">
                      <a href="{{ route('dashboard.users') }}" class="nav-link">
                      <i class="nav-icon far fa-user-circle"></i>
                      <p>
                          Users
                      </p>
                      </a>
                  </li>
                  @endif
                  @if (Auth::user()->hasRole('record') || Auth::user()->hasRole('admin'))
                <li class="nav-item ">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-sticky-note"></i>
                    <p>
                      Division Memoranda
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{ route('dashboard.memo') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Numbered</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('dashboard.unnummemo') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Unnumbered</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="{{ route('dashboard.advisory') }}" class="nav-link">
                    <i class="nav-icon fas fa-ad"></i>
                    <p>
                      Division Advisories
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('dashboard.order') }}" class="nav-link">
                    <i class="nav-icon fas fa-folder-open"></i>
                    <p>
                      DepEd Order
                    </p>
                  </a>
                </li>
               @endif
               @if (Auth::user()->hasRole('bac') || Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a href="{{ route('dashboard.invitation') }}" class="nav-link">
              <i class="nav-icon fab fa-invision"></i>
              <p>
                Invitation to Bid
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.timeline') }}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Timeline
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.award') }}" class="nav-link">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                Notice of Award
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.proceed') }}" class="nav-link">
              <i class="nav-icon fas fa-exclamation-circle"></i>
              <p>
                Notice to Proceed
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.bulliten') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Bid Bulliten
              </p>
            </a>
          </li>
          @endif
          @if (Auth::user()->hasRole('planning') || Auth::user()->hasRole('admin'))
          <li class="nav-item">
            <a href="{{ route('dashboard.elementary') }}" class="nav-link">
              <i class="nav-icon fas fa-school"></i> 
              <p>
                Elementary School
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.secondary') }}" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Secondary School
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.integrated') }}" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Integrated School
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard.private') }}" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Private School
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>