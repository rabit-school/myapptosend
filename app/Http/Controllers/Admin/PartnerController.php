<?php

// app/Http/Controllers/Admin/PartnerController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        $partners = Partner::latest()->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'license_key' => 'required|string|unique:partners',
            'allowed_areas' => 'required|string', // comma-separated or JSON string
            'currency_sign' => 'required|string|max:10',
        ]);

        Partner::create($data);

        return redirect()->route('admin.partners.index')
            ->with('status', 'Partner registered successfully!');
    }
}
