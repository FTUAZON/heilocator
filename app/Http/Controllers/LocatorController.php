<?php

namespace App\Http\Controllers;

use App\Models\Locator;
use Illuminate\Http\Request;
use App\Http\Requests\LocatorRequest;

class LocatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $search = $request->input('search');

    $locators = Locator::query()
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('address', 'like', '%' . $search . '%');
        })
        ->get();

    if ($request->ajax()) {
        return response()->json(['locators' => $locators]);
    }

    return view('locator.index', compact('locators', 'search'));
}


        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('locator.create');
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(LocatorRequest $request)
        {
        // Validaton on duplcate name
        if (Locator::where('name', $request->name)->exists()) {
            return redirect()->back()
                ->withErrors(['name' => 'This HEI name has already been registereds.'])
                ->withInput();
        }

        Locator::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'website' => $request->website,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('locators.index')->with('success', 'New HEI added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locator = Locator::findOrFail($id);

        return view('locator.edit', compact('locator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocatorRequest $request, string $id)
    {
        $locator = Locator::findOrFail($id);

        if (Locator::where('name', $request->name)
            ->where('id', '!=', $id)
            ->exists()) {
            return redirect()->back()
                ->withErrors(['name' => 'This HEI has already been registered.'])
                ->withInput();
        }

        $locator->update([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'website' => $request->website,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->route('locators.index')->with('success', 'HEI information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $locator = Locator::findOrFail($id);
        $locator->delete();

        return redirect()->route('locators.index')->with('success', 'HEI deleted successfully.');
    }

    
}


