  <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-shadow {{ $configData['navbarColor'] }}" data-nav="brand-center">
    <div class="navbar-container d-flex content">
      
      <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link nav-link-style">
              <i class="ficon" data-feather="{{($configData['theme'] === 'dark') ? 'sun' : 'moon' }}"></i>
            </a>
          </li>
        </ul>
      </div>
      
      <ul class="nav navbar-nav align-items-center ml-auto">
        <li class="nav-item dropdown dropdown-user">
          <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none">
              <span class="user-name font-weight-bolder">@if(null !== Auth::user()) {{ Auth::user()->name }} @else Invitado @endif</span>
              <span class="user-status">@if(null !== Auth::user()) {{ Auth::user()->email }} @else 😀 @endif</span>
            </div>
            <span class="avatar">
              <img class="round" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="40" width="40">
              <span class="avatar-status-online"></span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="mr-50" data-feather="user"></i> Profile
            </a>
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="mr-50" data-feather="mail"></i> Inbox
            </a>
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="mr-50" data-feather="check-square"></i> Task
            </a>
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="mr-50" data-feather="message-square"></i> Chats
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="mr-50" data-feather="settings"></i> Settings
            </a>
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="mr-50" data-feather="credit-card"></i> Pricing
            </a>
            <a class="dropdown-item" href="javascript:void(0)">
              <i class="mr-50" data-feather="help-circle"></i> FAQ
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              <i class="mr-50" data-feather="power"></i> Logout
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </a>
          </div>
        </li>
      </ul>

    </div>
  </nav>

  