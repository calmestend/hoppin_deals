<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Branch;
use App\Models\City;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::select(
            'branches.id',
            'addresses.neighborhood',
            'addresses.zip_code',
            'addresses.street',
            'addresses.number',
            'cities.name as city_name',
            'states.name as state_name'
        )
            ->join('addresses', 'branches.address_id', '=', 'addresses.id')
            ->join('cities', 'addresses.city_id', '=', 'cities.id')
            ->join('states', 'cities.state_id', '=', 'states.id')
            ->get();

        return view('layouts.admin.branches', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();

        return view('layouts.admin.branches.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'neighborhood' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:5'],
            'street' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:10'],
            'city_id' => ['required']
        ]);

        $address = Address::create([
            'neighborhood' => $request->neighborhood,
            'zip_code' => $request->zip_code,
            'street' => $request->street,
            'number' => $request->number,
            'city_id' => $request->city_id,
        ]);

        Branch::create([
            'address_id' => $address->id,
        ]);

        return redirect(route("admin.dashboard", absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch = Branch::select(
            'branches.id',
            'addresses.neighborhood',
            'addresses.zip_code',
            'addresses.street',
            'addresses.number',
            'cities.id as city_id',
            'cities.name as city_name',
            'states.name as state_name'
        )
        ->join('addresses', 'branches.address_id', '=', 'addresses.id')
        ->join('cities', 'addresses.city_id', '=', 'cities.id')
        ->join('states', 'cities.state_id', '=', 'states.id')
        ->where('branches.id', $id)
        ->first();
        $cities = City::all();
        return view('layouts.admin.branches.edit', compact(['branch', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = Branch::findOrFail($id);
        $address = Address::findOrFail($branch->address_id);
        $address->update($request->only(['neighborhood', 'zip_code', 'street', 'number', 'city_id']));

        return redirect()->route('admin.branches');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate(['id' => 'required']);
        $branch = Branch::findOrFail($request->id);
        $addressId = $branch->address_id;
        $branch->delete();
        Address::destroy($addressId);
        return redirect()->route('admin.branches');
    }
}
