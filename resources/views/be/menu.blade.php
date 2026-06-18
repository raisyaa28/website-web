@php
    $title = $title ?? '';
    $currentTitle = strtolower(trim($title));
    $isActiveTitle = function (array $titles) use ($currentTitle) {
        $normalizedTitles = array_map(static fn ($value) => strtolower(trim($value)), $titles);

        return in_array($currentTitle, $normalizedTitles, true);
    };
@endphp

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex align-items-center" href="{{ route('location.index') }}">
            <img src="{{ asset('assets/img/parkir.png') }}" class="navbar-brand-img h-100" alt="Parkiran logo">
            <span class="ms-2 font-weight-bold">PARKIRAN</span>
        </a>
    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('location.*') || $isActiveTitle(['location', 'locations']) ? 'active' : '' }}" href="{{ route('location.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md {{ request()->routeIs('location.*') || $isActiveTitle(['location', 'locations']) ? 'bg-gradient-primary' : 'bg-white' }} text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-map-marker-alt {{ request()->routeIs('location.*') || $isActiveTitle(['location', 'locations']) ? 'text-white' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Location</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('transactions.*') || $isActiveTitle(['transaction', 'transactions']) ? 'active' : '' }}" href="{{ route('transactions.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md {{ request()->routeIs('transactions.*') || $isActiveTitle(['transaction', 'transactions']) ? 'bg-gradient-primary' : 'bg-white' }} text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-receipt {{ request()->routeIs('transactions.*') || $isActiveTitle(['transaction', 'transactions']) ? 'text-white' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transaction</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('vehicletype.*') || $isActiveTitle(['vehicle type', 'vehicle types']) ? 'active' : '' }}" href="{{ route('vehicletype.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md {{ request()->routeIs('vehicletype.*') || $isActiveTitle(['vehicle type', 'vehicle types']) ? 'bg-gradient-primary' : 'bg-white' }} text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-car-side {{ request()->routeIs('vehicletype.*') || $isActiveTitle(['vehicle type', 'vehicle types']) ? 'text-white' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Vehicle Type</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Reports</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $isActiveTitle(['location report']) ? 'active' : '' }}" href="javascript:;">
                    <div class="icon icon-shape icon-sm shadow border-radius-md {{ $isActiveTitle(['location report']) ? 'bg-gradient-primary' : 'bg-white' }} text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-alt {{ $isActiveTitle(['location report']) ? 'text-white' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Location Report</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $isActiveTitle(['transaction report']) ? 'active' : '' }}" href="javascript:;">
                    <div class="icon icon-shape icon-sm shadow border-radius-md {{ $isActiveTitle(['transaction report']) ? 'bg-gradient-primary' : 'bg-white' }} text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-invoice {{ $isActiveTitle(['transaction report']) ? 'text-white' : 'text-dark' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1">Transaction Report</span>
                </a>
            </li>
        </ul>
    </div>
</aside>