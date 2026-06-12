@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection
@section('main')
@php
  $vehicleTypes = $vehicleTypes ?? collect();
  $locations = $locations ?? collect();
  $selectedLocationId = $selectedLocationId ?? null;
  $selectedVehicleTypeId = $selectedVehicleTypeId ?? null;
@endphp
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
  <div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Transaction</li>
      </ol>
      <h6 class="font-weight-bolder mb-0">Transaction</h6>
    </nav>

    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto d-flex align-items-center">
        <a href="{{ route('transactions.index') }}" class="btn bg-gradient-primary mb-0 me-3">
          <i class="fas fa-arrow-left me-1"></i>
          BACK TO TRANSACTIONS
        </a>
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid py-4">
  <div class="row mb-4">
    <div class="col-12">
      <div class="d-flex flex-wrap gap-3 justify-content-end mb-3">
        @foreach ($vehicleTypes as $vehicleType)
          <a href="{{ route('transactions.create', ['location_id' => $selectedLocationId, 'vehicle_type_id' => $vehicleType->id]) }}" class="btn btn-sm px-4 {{ $selectedVehicleTypeId == $vehicleType->id ? 'bg-dark text-white' : 'bg-white text-dark border' }}">
            {{ strtoupper($vehicleType->jenis) }}
          </a>
        @endforeach
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-8 mb-4">
      <div class="card shadow-sm border-0 p-3 mb-4">
        <div class="row g-3 align-items-stretch">
          <div class="col-md-6">
            <div class="rounded-4 overflow-hidden h-100 position-relative" style="min-height: 190px; background: linear-gradient(160deg, #2c3e73 0%, #0b0f14 100%);">
              <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at top right, rgba(255,255,255,0.12), transparent 40%), radial-gradient(circle at bottom left, rgba(203,12,159,0.20), transparent 35%);"></div>
              <div class="position-relative h-100 d-flex flex-column justify-content-between text-white p-4">
                <div class="d-flex align-items-start justify-content-between">
                  <div>
                    <div class="small opacity-75">Parking Time</div>
                    <div class="fw-bold">{{ now()->format('l') }}</div>
                    <div class="small opacity-75">{{ now()->format('j F Y') }}</div>
                  </div>
                  <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: rgba(255,255,255,0.12);">
                    <i class="fas fa-clock fa-lg"></i>
                  </div>
                </div>
                <div class="fw-bold text-center" id="clock-display" style="letter-spacing: 2px; font-size: 1.15rem;">00 : 00 : 00</div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="rounded-4 h-100 p-4 text-white position-relative overflow-hidden" style="min-height: 190px; background: linear-gradient(160deg, #1f2956 0%, #0b0f14 100%);">
              <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at top left, rgba(255,255,255,0.10), transparent 35%), radial-gradient(circle at bottom right, rgba(203,12,159,0.18), transparent 40%);"></div>
              <div class="position-relative h-100 d-flex flex-column justify-content-between">
                <div class="d-flex align-items-start justify-content-between">
                  <div>
                    <div class="small opacity-75">Parkir</div>
                   @php
$currentLocation = $locations->firstWhere('id', $selectedLocationId);
$currentVehicleType = $vehicleTypes->firstWhere('id', $selectedVehicleTypeId);
@endphp

<h5 class="mb-1 text-white">
    {{ $currentLocation?->location_name ?? 'Parking Area' }}
</h5>

<p class="mb-0 small opacity-75">
    {{ $currentVehicleType?->jenis ?? 'Vehicle Type' }}
</p>
                    <p class="mb-0 small opacity-75">{{ $vehicleTypes->first()?->jenis ?? 'Vehicle Type' }}</p>
                  </div>
                  <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; background: rgba(255,255,255,0.12);">
                    <i class="fas fa-parking fa-2x"></i>
                  </div>
                </div>
                <div class="d-flex gap-2 flex-wrap">
                  @foreach ($vehicleTypes as $vehicleType)
                    <span class="badge bg-white text-dark">{{ $vehicleType->jenis }}</span>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row g-3 mt-3">
          <div class="col-12">
            @include('transactions.frminsert')
          </div>
        </div>

        <div class="row g-3 mt-1">
          @foreach ($locations as $location)
            <div class="col-md-4">
              <a href="{{ route('transactions.create', ['location_id' => $location->id, 'vehicle_type_id' => $selectedVehicleTypeId]) }}" class="text-decoration-none">
                <div class="card shadow-none border {{ $selectedLocationId == $location->id ? 'border-primary' : 'border-light' }} h-100">
                  <div class="card-body p-3">
                    <div class="d-flex align-items-start justify-content-between mb-2">
                      <div>
                        <div class="fw-bold text-dark">{{ $location->location_name }}</div>
                        <small class="text-secondary">Location ID: {{ $location->id }}</small>
                      </div>
                      <span class="badge bg-gradient-primary">{{ $selectedLocationId == $location->id ? 'ACTIVE' : 'SLOT' }}</span>
                    </div>

                    <div class="d-flex gap-2 flex-wrap mt-3">
                      <span class="badge {{ $location->max_motorcycle > 0 ? 'bg-gradient-success' : 'bg-gradient-danger' }}">Motor: {{ $location->max_motorcycle }}</span>
                      <span class="badge {{ $location->max_car > 0 ? 'bg-gradient-success' : 'bg-gradient-danger' }}">Car: {{ $location->max_car }}</span>
                      <span class="badge {{ $location->max_other > 0 ? 'bg-gradient-success' : 'bg-gradient-danger' }}">Other: {{ $location->max_other }}</span>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="col-lg-4 mb-4">
      <div class="card shadow-sm border-0 h-100">
        <div class="card-header bg-transparent border-0 px-4 pt-4 pb-0 d-flex align-items-center justify-content-between">
          <h6 class="mb-0">Tickets</h6>
          <a href="{{ route('transactions.index') }}" class="btn btn-outline-primary btn-sm mb-0">VIEW ALL</a>
        </div>
        <div class="card-body px-4 pt-3 pb-4">
          @forelse ($recentTransactions as $transaction)
            <div class="border-bottom py-2">
              <div class="fw-bold text-dark">{{ $transaction->no_tiket }}</div>
              <small class="text-secondary">{{ $transaction->location?->location_name }} - {{ $transaction->vehicleType?->jenis }}</small>
            </div>
          @empty
            <div class="text-secondary text-sm">No tickets yet.</div>
          @endforelse
        </div>
      </div>
    </div>
  </div>

  <script>
    function updateClock() {
      const now = new Date();
      const parts = [now.getHours(), now.getMinutes(), now.getSeconds()].map(value => String(value).padStart(2, '0'));
      const clock = document.getElementById('clock-display');
      if (clock) {
        clock.textContent = parts.join(' : ');
      }
    }

    updateClock();
    setInterval(updateClock, 1000);
  </script>
</div>
@endsection