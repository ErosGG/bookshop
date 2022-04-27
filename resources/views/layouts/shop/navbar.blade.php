{{--<div class="navbar sticky-top bg-dark text-white pt-3 pb-3 ps-5 shadow-sm">--}}
{{--    <span class="fs-4">@yield('section')</span>--}}
{{--    <div class="me-4">--}}
{{--        @yield('navbar-buttons')--}}
{{--    </div>--}}
{{--</div>--}}
{{--@yield('collapsed-filters')--}}
{{--<header class="p-3 border-bottom">--}}
<header class="navbar sticky-top navbar-light bg-light shadow-sm p-3 border-bottom fs-5">
    <div class="container d-block">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start border-bottom pb-3">
            <a href="{{ route('shop') }}" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('shop') }}" class="nav-link px-2 link-secondary">llibreria.cat</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link-dark" href="#" id="categories_navbar_menu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-diagram-3 me-1"></i>Categories
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="categories_navbar_menu">
                        @foreach($highlightedCategories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('shop.category.products', ['category' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                        <li><a class="dropdown-item" href="{{ route('shop.categories') }}">Totes les categories</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('shop.cart') }}" class="nav-link px-2 link-dark"><i class="bi bi-basket me-1"></i>Cistella</a></li>

                <x-button.filter btn-class="btn-outline-dark"></x-button.filter>
            </ul>

{{--            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">--}}
{{--                <input type="search" class="form-control" placeholder="Cercar" aria-label="Search">--}}
{{--            </form>--}}

            @auth
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="mdo" class="rounded-circle" width="32" height="32">
                        <strong>{{ auth()->user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="{{ route('shop.user.profile', ['user' => auth()->user()->uuid ]) }}">Perfil</a></li>
                        <li><a class="dropdown-item" href="{{ route('shop.user.orders', ['user' => auth()->user()->uuid ]) }}">Comandes</a></li>
                        @admin
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">Administració</a></li>
                        @endadmin
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Finalitzar la sessió</a></li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm">Inicia la sessió</a>
            @endauth

        </div>
        <div class="collapse" id="collapsed_filters">
            <div class="card card-body bg-light">
                <x-form.form method="get" action="{{ route('shop.search') }}">
                    <x-form.input-text id="title" name="title" label="Títol" placeholder="Títol"></x-form.input-text>
                    <x-form.input-text id="author" name="author" label="Autor" placeholder="Autor"></x-form.input-text>
                    <x-form.input-text id="year" name="year" label="Any" placeholder="Any"></x-form.input-text>
                    <x-form.input-number id="price" name="price" label="Preu" placeholder="Preu" min="0" step="0.01"></x-form.input-number>
                    <x-form.input-number id="stock" name="stock" label="Estoc" placeholder="Estoc" min="0"></x-form.input-number>
                    {{--            <x-form.select id="status" name="status" label="Estat" placeholder="Estat" :options="$options"></x-form.select>--}}
                </x-form.form>
            </div>
        </div>
        <div>
            <ul class="nav col-12 col-lg-auto me-lg-auto mt-3 mb-2 justify-content-evenly mb-md-0">
                @foreach($highlightedCategories as $category)
                    <li>
                        <a class="nav-link px-2 link-dark" href="{{ route('shop.category.products', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
{{--                <li><a href="#" class="nav-link px-2 link-secondary">Història</a></li>--}}
{{--                <li><a href="#" class="nav-link px-2 link-dark">Ciència Ficció</a></li>--}}
{{--                <li><a href="#" class="nav-link px-2 link-dark">Fantasia</a></li>--}}
            </ul>
        </div>
    </div>
</header>
