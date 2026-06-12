@extends('be.master')

@section('menu')
@include('be.menu')
@endsection

@section('main')

@php
$currentLocation = $locations->firstWhere('id', $selectedLocationId);
$currentVehicleType = $vehicleTypes->firstWhere('id', $selectedVehicleTypeId);
@endphp

<div class="container-fluid py-4">

    <div class="row mb-3">

        <div class="col-md-8">

            <div class="d-flex justify-content-end gap-2 mb-3">

                @foreach($vehicleTypes as $vehicleType)

                <a href="{{ route('transactions.index',[
                    'location_id'=>$selectedLocationId,
                    'vehicle_type_id'=>$vehicleType->id
                ]) }}"
                class="btn btn-sm {{ $selectedVehicleTypeId == $vehicleType->id ? 'btn-dark' : 'btn-outline-dark' }}">

                    {{ strtoupper($vehicleType->jenis) }}

                </a>

                @endforeach

            </div>

        </div>

        <div class="col-md-4 text-end">

            <a href="#" class="btn bg-gradient-primary">
                <i class="fas fa-plus"></i>
                ENTER VEHICLE
            </a>

        </div>

    </div>

    <div class="row">

        <div class="col-lg-8">

            <div class="row mb-3">

                <div class="col-md-4">

                    <div class="card shadow-sm">

                        <div class="card-body text-center">

                            <i class="fas fa-building fa-3x text-primary mb-3"></i>

                            <h6>{{ now()->format('l') }}</h6>

                            <small>
                                {{ now()->format('d F Y') }}
                            </small>

                            <h3 class="mt-3" id="clock-display"></h3>

                        </div>

                    </div>

                </div>

                <div class="col-md-8">

                    <div class="card shadow-sm">

                        <div class="card-body">

                            <h5>
                                {{ $currentLocation?->location_name }}
                            </h5>

                            <p class="text-muted">
                                {{ $currentVehicleType?->jenis }}
                            </p>

                            <div class="mt-3">

                                <span class="badge bg-success">
                                    Motor :
                                    {{ $currentLocation?->max_motorcycle }}
                                </span>

                                <span class="badge bg-primary">
                                    Car :
                                    {{ $currentLocation?->max_car }}
                                </span>

                                <span class="badge bg-dark">
                                    Other :
                                    {{ $currentLocation?->max_other }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @include('transactions.frminsert')

            <div class="row mt-3">

                @foreach($locations as $location)

                <div class="col-md-4 mb-3">

                    <a href="{{ route('transactions.index',[
                        'location_id'=>$location->id,
                        'vehicle_type_id'=>$selectedVehicleTypeId
                    ]) }}"
                    class="text-decoration-none">

                        <div class="card shadow-sm {{ $selectedLocationId == $location->id ? 'border border-primary' : '' }}">

                            <div class="card-body">

                                <h6>
                                    {{ $location->location_name }}
                                </h6>

                                <div class="mt-2">

                                    <span class="badge bg-success">
                                        Motor {{ $location->max_motorcycle }}
                                    </span>

                                    <span class="badge bg-primary">
                                        Car {{ $location->max_car }}
                                    </span>

                                    <span class="badge bg-dark">
                                        Other {{ $location->max_other }}
                                    </span>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

                @endforeach

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card shadow-sm">

                <div class="card-header d-flex justify-content-between">

                    <h6 class="mb-0">
                        Tickets
                    </h6>

                    <a href="#" class="btn btn-outline-primary btn-sm">
                        VIEW ALL
                    </a>

                </div>

                <div class="card-body" style="min-height:450px">

                    @forelse($recentTransactions as $transaction)

                    <div class="border-bottom py-2">

                        <div class="fw-bold">

                            {{ $transaction->no_tiket }}

                        </div>

                        <small class="text-muted">

                            {{ $transaction->location?->location_name }}
                            -
                            {{ $transaction->vehicleType?->jenis }}

                        </small>

                    </div>

                    @empty

                    <div class="text-center text-muted">

                        No Tickets Yet

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function updateClock()
{
    const now = new Date();

    document.getElementById('clock-display')
        .innerHTML = now.toLocaleTimeString('id-ID');
}

updateClock();
setInterval(updateClock,1000);

</script>

@endsection