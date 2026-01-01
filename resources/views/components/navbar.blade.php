<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('vacancies.index') }}">JobBoard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('vacancies.index') }}">Home</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('vacancies.create') }}">Add Job</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown" data-bs-display="static">
                            Profile
                        </a>

                        <ul class="dropdown-menu dropdown-menu-profile">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">My profile</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit
                                    profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register.index') }}">Register</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
