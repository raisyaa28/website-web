<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Transactions;
use App\Models\Vehicletype;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $selectedLocationId = request()->integer('location_id')
        ?: Location::value('id');

    $selectedVehicleTypeId = request()->integer('vehicle_type_id')
        ?: Vehicletype::value('id');

    return view('transactions.index', [
        'title' => 'Transaction',
        'locations' => Location::all(),
        'vehicleTypes' => Vehicletype::all(),
        'selectedLocationId' => $selectedLocationId,
        'selectedVehicleTypeId' => $selectedVehicleTypeId,
        'recentTransactions' => Transactions::latest('id')->take(10)->get(),
        'nextTicket' => Transactions::count() + 1,
    ]);
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $selectedLocationId = request()->integer('location_id') ?: Location::value('id');
        $selectedVehicleTypeId = request()->integer('vehicle_type_id') ?: Vehicletype::value('id');

        return view('transactions.create', [
            'title' => 'Add New Transaction',
            'locations' => Location::all(),
            'vehicleTypes' => Vehicletype::all(),
            'selectedLocationId' => $selectedLocationId,
            'selectedVehicleTypeId' => $selectedVehicleTypeId,
            'defaultLocationId' => $selectedLocationId ?? 1,
            'defaultVehicleTypeId' => $selectedVehicleTypeId ?? null,
            'recentTransactions' => Transactions::latest('id')->take(5)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'id_lokasi' => 'required',
        'id_jenis' => 'required',
        'no_tiket' => 'required',
    ]);

    Transactions::create([
        'id_lokasi' => $request->id_lokasi,
        'id_jenis' => $request->id_jenis,
        'no_tiket' => $request->no_tiket,
        'no_polisi' => null,
        'masuk' => now(),
        'keluar' => now(),
        'perjam_pertama' => 0,
        'perjam_berikutnya' => 0,
        'max_perhari' => 0,
        'total_jam' => 0,
        'total_bayar' => 0,
    ]);

    return redirect()->route('transactions.index')
        ->with('success', 'Vehicle entered successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('transactions.show', [
            'title' => 'Transaction Details',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Transactions::findOrFail($id);

        return view('transactions.edit', [
            'title' => 'Transactions',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'no_tiket' => ['required', 'string', 'max:255'],
            'no_polisi' => ['nullable', 'string', 'max:255'],
        ]);

        $transaction = Transactions::findOrFail($id);
        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
