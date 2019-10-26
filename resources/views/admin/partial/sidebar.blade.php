<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ asset('images/profile/'.Auth::user()->image) }}" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="fa fa-bookmark text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item {{Request::is('admin') ? 'active': '' }}">
              <a class="nav-link" href="{{ route('admin') }}">
                <span class="menu-title">Dashboard</span>
                <i class="fa fa-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item {{Request::is('dateandtime') ? 'active': '' }}">
              <a class="nav-link" href="{{ route('dateandtime') }}">
                <span class="menu-title">Date and Time</span>
                <i class="fa fa-check-circle-o menu-icon"></i>
              </a>
            </li>
            <li class="nav-item {{Request::is('admin/post*') ? 'active': '' }}">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Post</span>
                <i class="fa fa-home menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="" href="{{ route('admin.index') }}"> <i class="fa fa-user-secret ml-1"></i> Add post</a></li>
                  <li class="nav-item"> <a class="" href="{{ route('admin.view') }}"><i class="fa fa-user-secret ml-1"></i> View Post</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                
              </span>
            </li>
          </ul>
        </nav>