<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertStoreRequest;
use App\Http\Requests\CertUpdateRequest;
use App\Models\Cert;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class CertController extends Controller
{
    public function index(Request $request): View
    {
        $certs = Cert::all();

        return view('cert.index', compact('certs'));
    }

    public function create(Request $request): View
    {
        return view('cert.create');
    }

    public function store(CertStoreRequest $request): RedirectResponse
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

        $cert = Cert::create([
            'file_name' => $folder.$fileName,
            'project_id' => 'default_value',
            'order_id' => 'default_value',
            'pc_id' => 'default_value',
            'latest_pc_id' => 'default_value',
            'user_id' => '1',
        ]);

        $request->session()->flash('cert.id', $cert->id);

        return redirect()->route('certs.index');
    }
    
    

    public function show(Request $request, Cert $cert): View
    {
        return view('cert.show', compact('cert'));
    }

    public function edit(Request $request, Cert $cert): View
    {
        $previousCert = Cert::where('user_id', $cert->user_id)
            ->where('col4', 1)
            ->where('id', '<', $cert->id)
            ->orderBy('id', 'desc')
            ->first();

        $nextCert = Cert::where('user_id', $cert->user_id)
            ->where('col4', 1)
            ->where('id', '>', $cert->id)
            ->orderBy('id', 'asc')
            ->first();
        
        return view('cert.edit', compact('cert', 'previousCert', 'nextCert'));
    }

    public function update(CertUpdateRequest $request, Cert $cert): RedirectResponse
    {
       
        if($request->col1){
            $updated = $cert->update(['col1' => '2']);
        }
        
        $updated = $cert->update($request->all());
        $updated = $cert->update(['col4' => '1']);
        // $updated = $cert->update(['col1' => '2']);

        if($updated){
            $request->session()->flash('cert.id', $cert->id);
            return redirect()->route('dashboard')->with('success','PC updated successfully');
        }
        else {
            return back()->with('error', 'Failed to update certificate');
        }


    }

    public function destroy(Request $request, Cert $cert): Response
    {
        $cert->delete();

        return redirect()->route('certs.index');
    }

    public function remove_issue_flag(Request $request, Cert $cert): Response
    {
        $cert->update(['col1' => '0']);

        return redirect()->route('certs.somethingwrong');
    }
}
