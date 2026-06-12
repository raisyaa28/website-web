<?php

namespace App\Http\Controllers;

use App\Models\Vehicletype;
use Illuminate\Http\Request;

class VehicletypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vehicletype.index', [
            'title' => 'Vehicle Types',
            'datas' => Vehicletype::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehicletype.create', [
            'title' => 'Add New Vehicle Type',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => ['required', 'string', 'max:255'],
            'perjam_pertama' => ['required', 'integer', 'min:0'],
            'perjam_berikutnya' => ['required', 'integer', 'min:0'],
            'max_perhari' => ['required', 'integer', 'min:0'],
        ]);

        Vehicletype::create($validated);

        return redirect()->route('vehicletype.index')->with('success', 'Vehicle Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            return view('vehicletype.show', [
                'title' => 'Vehicle Type Details',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('vehicletype.edit', [
            'title' => 'Edit Vehicle Type',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'jenis' => ['required', 'string', 'max:255'],
            'perjam_pertama' => ['required', 'integer', 'min:0'],
            'perjam_berikutnya' => ['required', 'integer', 'min:0'],
            'max_perhari' => ['required', 'integer', 'min:0'],
        ]);

        $vehicleType = Vehicletype::findOrFail($id);
        $vehicleType->update($validated);

        return redirect()->route('vehicletype.index')->with('success', 'Vehicle type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('vehicletype.index')->with('success', 'Vehicle type deleted successfully.');
    }
}
