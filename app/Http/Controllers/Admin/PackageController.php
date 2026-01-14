<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::query()->latest()->paginate(15);

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'max_guests' => ['required', 'integer', 'min:1'],
            'features' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $package = Package::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'max_guests' => $validated['max_guests'],
            'features' => $this->parseFeatures($validated['features'] ?? null),
            'category' => $validated['category'] ?? null,
            'is_active' => (bool) ($validated['is_active'] ?? false),
        ]);

        return redirect()->route('admin.packages.show', $package)->with('success', 'Package created successfully.');
    }

    public function show(Package $package)
    {
        return view('admin.packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'max_guests' => ['required', 'integer', 'min:1'],
            'features' => ['nullable', 'string'],
            'category' => ['nullable', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $package->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'max_guests' => $validated['max_guests'],
            'features' => $this->parseFeatures($validated['features'] ?? null),
            'category' => $validated['category'] ?? null,
            'is_active' => (bool) ($validated['is_active'] ?? false),
        ]);

        return redirect()->route('admin.packages.show', $package)->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Package deleted successfully.');
    }

    private function parseFeatures(?string $features): ?array
    {
        if (! $features) {
            return null;
        }

        $items = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $features)));

        return $items ?: null;
    }
}
