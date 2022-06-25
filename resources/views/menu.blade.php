<div class="col-auto col-md-3 col-xl-2 px-3 bg-dark ">
    <div class="text-capitalize min-vh-100">
        <div class="my-3">
            <a href="" class="text-white text-decoration-none">
                <span class="fs-1 d-flex">
                    <img src="https://cdn.logo.com/hotlink-ok/logo-social.png" class="rounded-circle me-sm-3" height="50px"
                        width="50px" alt="" srcset="">
                    <span class=" d-none d-sm-inline align-items-center"> 
                        {{ __('msg.menu') }}
                    </span>
                </span>
            </a>
        </div>


        <nav class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <li class="nav-item">
                <a href="/" class="nav-link active px-sm-3 px-2 ">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">{{ __('msg.home') }}</span>
                </a>
                <a href="/create" class="nav-link px-sm-3 px-2 ">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">{{ __('msg.import') }}</span>
                </a>
                <a href="/list" class="nav-link px-sm-3 px-2 ">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">{{ __('msg.list') }}</span>
                </a>
                <a href="/history" class="nav-link px-sm-3 px-2 ">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">{{ __('msg.history') }}</span>
                </a>
                {{-- <a href="/about" class="nav-link px-sm-3 px-2 ">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">{{ __('msg.about') }}</span>
                </a> --}}
                <a href="/salercontact" class="nav-link px-sm-3 px-2 ">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline ">{{ __('msg.contact') }}</span>
                </a>
            </li>
        </nav>
        <hr>
    </div>
</div>
