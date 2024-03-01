<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="flex flex-col mt-2 justify-center">
            <a class="w-3/5 my-4 mx-6" href="{{ url('/dashboard') }}">
                <img src="./logoTelkomPutih-removebg-preview.png" alt="Tabler" class="w-full">
            </a>
            <div class="m-3">
                <a class="nav-link mb-2 w-1/2" href="{{ route('dashboard.index') }}">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                    </span>
                    <div>
                        <p class="font-normal">Beranda</p>
                    </div>
                </a>
                <a href="{{ route('devlay.data') }}" class="pointer-events-none cursor-not-allowed">
                    <div class="btn btn-danger w-full mt-2">
                        <p class="font-normal">Perpustakaan</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</aside>
