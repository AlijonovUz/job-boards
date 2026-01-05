<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('vacancies.index') }}">JobBoard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown me-2">
                        <a class="nav-link position-relative notification-link"
                           href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell fs-5"></i>

                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                                style="transform: translate(-50%, -30%); top: 6px;">
                                3
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-profile p-2" style="width: 320px">
                            <li class="dropdown-header fw-bold text-primary">
                                Notifications
                            </li>

                            <li>
                                <a class="dropdown-item small fw-bold" href="#">
                                    Vacancy yaratildi
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item small" href="#">
                                    Vacancy yangilandi
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item text-center" href="#">
                                    Mark all as read
                                </a>
                            </li>
                        </ul>
                    </li>
                    @can('create', \App\Models\Vacancy::class)
                        <li class="nav-item"><a class="nav-link" href="{{ route('vacancies.create') }}">Add Job</a></li>
                    @endif
                
                    @can('create', \App\Models\Mail::class)
                        <li class="nav-item"><a class="nav-link" href="{{ route('mail.create') }}">Send Message</a></li>
                    @endcan
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
