<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        return view('admin.rates.index', [
            'rates' => Rate::orderBy('sort_order')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.rates.form', ['rate' => new Rate()]);
    }

    public function store(Request $request)
    {
        Rate::create($this->validated($request));
        return redirect()->route('admin.rates.index')->with('success', 'Rate berhasil ditambahkan.');
    }

    public function edit(Rate $rate)
    {
        return view('admin.rates.form', compact('rate'));
    }

    public function update(Request $request, Rate $rate)
    {
        $rate->update($this->validated($request));
        return redirect()->route('admin.rates.index')->with('success', 'Rate berhasil diperbarui.');
    }

    public function destroy(Rate $rate)
    {
        $rate->delete();
        return back()->with('success', 'Rate berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'provider' => ['required', 'string', 'max:100'],
            'rate' => ['required', 'numeric', 'min:0', 'max:1'],
            'min_amount' => ['required', 'integer', 'min:0'],
            'max_amount' => ['required', 'integer', 'gte:min_amount'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => false];
    }
}
