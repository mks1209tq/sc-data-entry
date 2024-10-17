<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertStoreRequest;
use App\Http\Requests\CertUpdateRequest;
use App\Models\Cert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertController extends Controller
{
    public function index(Request $request): Response
    {
        $certs = Cert::all();

        return view('cert.index', compact('certs'));
    }

    public function create(Request $request): Response
    {
        return view('cert.create');
    }

    public function store(CertStoreRequest $request): Response
    {
        $cert = Cert::create($request->validated());

        $request->session()->flash('cert.id', $cert->id);

        return redirect()->route('certs.index');
    }

    public function show(Request $request, Cert $cert): Response
    {
        return view('cert.show', compact('cert'));
    }

    public function edit(Request $request, Cert $cert): View
    {
        return view('cert.edit', compact('cert'));
    }

    public function update(CertUpdateRequest $request, Cert $cert): RedirectResponse
    {
        $updated = $cert->update($request->all());

        if($updated){
            $request->session()->flash('cert.id', $cert->id);
            return redirect()->route('dashboard')->with('success','Passport updated successfully');
        }
        else {
            return back()->with('error', 'Failed to update passport');
        }


    }

    public function destroy(Request $request, Cert $cert): Response
    {
        $cert->delete();

        return redirect()->route('certs.index');
    }
}
