<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('location.index', [
            'title' => 'Locations',
            'datas' => Location::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('location.create', [
            'title' => 'Add New Location',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location_name' => ['required', 'string', 'max:255'],
            'max_motorcycle' => ['required', 'integer', 'min:0'],
            'max_car' => ['required', 'integer', 'min:0'],
            'max_other' => ['required', 'integer', 'min:0'],
        ]);

        Location::create($validated);

        return redirect()->route('location.index')->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('location.show', [
            'title' => 'Location Details',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Location::findOrFail($id);

    return view('location.edit', [
        'title' => 'Location',
        'data' => $data
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'location_name' => ['required', 'string', 'max:255'],
            'max_motorcycle' => ['required', 'integer', 'min:0'],
            'max_car' => ['required', 'integer', 'min:0'],
            'max_other' => ['required', 'integer', 'min:0'],
        ]);

        $location = Location::findOrFail($id);
        $location->update($validated);

        return redirect()->route('location.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Location::where('id', $id)->delete();
        Location::destroy($id);

        return redirect()->route('location.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
