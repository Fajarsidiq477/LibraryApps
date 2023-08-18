<div class="navbar navbar-upper bg-primary py-2">
    <div class="container">
        <a class="navbar-brand text-light" href="{{ route('userIndex') }}">SIJAMBU IPAI</a>

        <div class="col-md-6 d-none d-md-flex">
            <div class="input-group p-2">
                <input
                    type="text"
                    class="form-control"
                    aria-label="Text input with 2 dropdown buttons"
                    placeholder="Pencarian ...."
                />
                <button
                    class="btn bg-secondary text-light"
                    type="button"
                >
                    <i data-feather="search"></i>
                </button>
            </div>
        </div>

        {{-- notifikasi --}}
        {{-- <div
            class="dropdown text-center d-none d-lg-flex"
            style="background-color: transparent"
        >
            <a
                class="nav-link"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <i data-feather="bell"></i>
            </a>
            <ul
                class="dropdown-menu px-3"
                style="width: 300px; left: -200px"
            >
                <li>
                    <p class="dropdown-item fw-bold">Notifikasi</p>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <p class="m-0" style="font-size: 0.8rem">
                        Lorem ipsum dolor sit amet consectetur
                        adipisicing elit. Amet quam illo ad aut rerum
                        perspiciatis quis praesentium quisquam quia
                        deserunt numquam cupiditate harum, consequuntur
                        dolorum aspernatur dolore inventore omnis
                        officia?
                        <span class="d-block text-secondary"
                            >6 Juli 2023</span
                        >
                    </p>
                </li>
            </ul>
        </div> --}}

        <div class="d-flex dropdown px-2">
            <a
                class="nav-link d-flex justify-content-between align-items-center"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <div class="avatar">
                    <!-- <img
                        src="https://placehold.co/200"
                        alt="avatar"
                        class="img-fluid"
                    /> -->
                    <i data-feather="user"></i>
                </div>

                <div class="col text-center">
                    <i data-feather="menu"></i>
                </div>
            </a>
            <ul class="dropdown-menu">
                @if (Auth::check())
                    @if (Auth::user()->role ==2)
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}"
                                >Profile</a
                            >
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('activity') }}">Aktivitas</a>
                        </li>
                    @elseif(Auth::user()->role == 0 || Auth::user()->role == 1)
                        <li>
                            <a class="dropdown-item" href="{{ route('adminIndex') }}">Dashboard</a>
                        </li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a class="dropdown-item" href="{{ route('login') }}"
                            >Login</a
                        >
                    </li>
                @endif
                
            </ul>
        </div>
    </div>
</div>