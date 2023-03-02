<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index(Request $request)
    {
        $providers = new Provider();

        if ($request->name) {
            $providers = $providers->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->id) {
            $providers = $providers->where('id', $request->id);
        }
        
        $providers = $providers->paginate(10);
        $viewData = [
            'providers' => $providers
        ];

        return view('pages.providers.index')->with($viewData);
    }

    public function create()
    {
        return view('pages.providers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Provider::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note
        ]);

        $request->session()->put('success', true);

        return redirect()->route('get.providers');
    }

    public function edit($id)
    {
        $provider = Provider::where('id', $id)->first();

        if (!$provider) {
            return redirect()->route('get.providers');
        }

        $viewData = [
            'provider' => $provider
        ];

        return view('pages.providers.edit')->with($viewData);
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Provider::where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note
        ]);

        $request->session()->put('success', true);
        
        return redirect()->route('get.providers');
    }

    public function delete($id)
    {
        Provider::where('id', $id)->delete();

        $request->session()->put('success', true);

        return redirect()->route('get.providers');
    }
}
