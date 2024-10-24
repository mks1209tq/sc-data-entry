<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassportStoreRequest;
use App\Http\Requests\PassportUpdateRequest;
use App\Models\Passport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PassportController extends Controller
{
    public function index(Request $request): View
    {
        $passports = Passport::all();

        return view('passport.index', compact('passports'));
    }

    public function create(Request $request): View
    {
        return view('passport.create');
    }

    public function store(PassportStoreRequest $request): RedirectResponse
    {
        // dd($request->all());
        
        $passport = Passport::create($request->validated());

        $request->session()->flash('passport.id', $passport->id);

        return redirect()->route('passports.index');
    }

    public function show(Request $request, Passport $passport): View
    {
        return view('passport.show', compact('passport'));
    }

    public function edit(Request $request, Cert $cert): View
    {
        $previousPassport = Passport::where('user_id', $passport->user_id)
            ->where('col4', 1)
            ->where('id', '<', $passport->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextPassport = Passport::where('user_id', $passport->user_id)
            ->where('col4', 1)
            ->where('id', '>', $passport->id)
            ->orderBy('id', 'asc')
            ->first();
        
        return view('passport.edit', compact('passport', 'previousPassport', 'nextPassport'));
    }

    public function update(PassportUpdateRequest $request, Passport $passport): RedirectResponse
    {
       
        if($request->col1){
            $updated = $passport->update(['col1' => '2']);
        }
        
            $updated = $passport->update($request->all());
        $updated = $passport->update(['col4' => '1']);
        // $updated = $cert->update(['col1' => '2']);

        if($updated){
            $request->session()->flash('passport.id', $passport->id);
            return redirect()->route('dashboard')->with('success','PC updated successfully');
        }
        else {
            return back()->with('error', 'Failed to update passport');
        }


    }

    public function destroy(Request $request, Passport $passport): Response
    {
        $passport->delete();

        return redirect()->route('certs.index');
    }

   
}
