<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassportStoreRequest;
use App\Http\Requests\PassportUpdateRequest;
use App\Models\Passport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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
        

    
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = $file->getClientOriginalName();
            $folder = 'finished/';
            
            try {
                // Attempt to store the file
                $success = Storage::disk('idrive_e2')->put($folder.$fileName, file_get_contents($file->getRealPath()));
                
                // Prepare the response
                $response = [
                    'success' => $success,
                    'file_name' => $fileName,
                    'file_size' => $file->getSize(),
                    'file_mime' => $file->getMimeType(),
                    'storage_path' => $success ? $fileName : null,  // Changed this line
                ];
    
                // If the storage failed, try to get more information
                if (!$success) {
                    $response['error'] = 'File upload failed. Check your iDrive configuration.';
                }
    
                // Dump and die with the response
                // dd($response);
    
            } catch (\Exception $e) {
                dd([
                    'success' => false,
                    'error' => $e->getMessage(),
                    'file_name' => $fileName,
                ]);
            }
        }
    
        // dd('No file was uploaded');
        //return view('document.create');

        $passport = Passport::create([
            'employee_id' => $request->employee_id,
        
            'file_name' => $folder.$fileName,
            
        ]);

        $request->session()->flash('passport.id', $passport->id);
        
        // dd($response);

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
