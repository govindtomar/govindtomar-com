<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" style="background: #ffffff !important; box-shadow: 0px 2px 5px 1px #dddddd;">
  <div class="container">
    <a class="navbar-brand" href="{{ url('dashboard') }}">GST</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/chat') }}">Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/word-meaning') }}">Word Meaning</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/blog') }}">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/package') }}">Package</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="UserSettings" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="UserSettings">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>