@extends('layouts.app')

    @section('content')
    <div class="pt-3">
    
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-2">
            <div class="flex justify-between my-2">
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                {{ $cert->user() ? $cert->user->id . ' - ' . $cert->user->name : 'Unassigned' }}
                            </a> 
                            @if(auth()->user() && auth()->user()->is_admin)
                                @if($previousCert)
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('certs.edit', $previousCert->id) }}">
                                        << Previous
                                    </a>
                                @else
                                    <span class="inline-block align-baseline font-bold text-sm text-gray-400">
                                        << Previous
                                    </span>
                                @endif
                                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('certs.show', $cert->id) }}">
                                    Show Record
                                </a>
                                @if($nextCert)
                                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('certs.edit', $nextCert->id) }}">
                                        Next >>
                                    </a>
                                @else
                                    <span class="inline-block align-baseline font-bold text-sm text-gray-400">
                                        Next >>
                                    </span>
                                @endif
                            @endif    
            <a href="{{ route('dashboard') }}" 
                                   class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                    Cancel
                                    </a>
                                    
                                                     
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 text-gray-900 flex flex-row">
                    <div class="flex flex-col ">
                    <div class="w-4/12 px-1 w-full">
                    <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-2 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                                REC_ID
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="id" 
                                   type="text" 
                                   name="id" 
                                   value="{{ old('id', $cert->id) }}" 
                                   readonly>
                        </div>

                        <div class="mb-4">
                            <label   class="hidden block text-gray-700 text-sm font-bold mb-2" for="PO Num">
                                SWO Number
                            </label>
                            <input class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="po_number" 
                                   type="text" 
                                   name="po_number" 
                                   value="{{ old('PO_number', $cert->PO_number) }}" 
                                   readonly>
                        </div>
                        
                        </form>





                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-1 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       




                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col19">
                                SWO Reference
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col19" 
                                   type="text" 
                                   name="col19" 
                                   value="{{ old('col19', $cert->col19) }}"
                                    required
                                   
                                >
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col11">
                                Work Done to Date
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col11" 
                                   type="number"
                                   step="0.01"
                                   name="col11" 
                                   value="{{ old('col11', $cert->col11) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col13">
                                Material on Site
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col13" 
                                   type="number"
                                   step="0.01"
                                   name="col13" 
                                   value="{{ old('col13', $cert->col13) }}"
                                   required
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="advance_amount">
                                Advance Payment
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="advance_amount" 
                                   type="number"
                                   step="0.01"
                                   name="advance_amount" 
                                   value="{{ old('advance_amount', $cert->advance_amount) }}"
                                   required
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col15">
                                Recovery of Advance
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col15" 
                                   type="number"
                                   step="0.01"
                                   name="col15" 
                                   value="{{ old('col15', $cert->col15) }}"
                                   required
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="retention_amount">
                                Retention Amount
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="retention_amount" 
                                   type="number"
                                   step="0.01"
                                   name="retention_amount" 
                                   value="{{ old('retention_amount', $cert->retention_amount) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col17">
                                Release Retention First Half
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col17" 
                                   type="number"
                                   step="0.01"
                                   name="col17" 
                                   value="{{ old('col17', $cert->col17) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col21">
                                Release Retention Second Half
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col21" 
                                   type="number"
                                   step="0.01"
                                   name="col21" 
                                   value="{{ old('col21', $cert->col21) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="deduction_amount">
                                Deduction Amount
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="deduction_amount" 
                                   type="number"
                                   step="0.01"
                                   name="deduction_amount" 
                                   value="{{ old('deduction_amount', $cert->deduction_amount) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col23">
                                Invoice Total
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col23" 
                                   type="number"
                                   step="0.01"
                                   name="col23" 
                                   value="{{ old('col23', $cert->col23) }}"
                                   required
                                >
                        </div>




                        

                        <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                            type="submit">
                                    Submit
                                </button>
                               
                                
                            </div>
                        </form>







                        




                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-1 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                                             

                        

                        
                        <div class="mb-4">
                        <label class=" block text-gray-700 text-sm font-bold mb-2" for="single_po">
                                Enter Issue 
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col5" 
                                   type="textarea" 
                                   name="col5" 
                                   value="{{ old('col5', $cert->col5) }}"
                                   {{ old('col5', $cert->col5) ? 'checked' : ''}}
                                >
                            
                        </div>

                        

                        

                        <div class="flex items-center justify-between">
                                
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                            type="submit">
                                    Something Wrong
                                </button>
                               
                            </div>

                            
                            
                        </form>
                    </div>
                    </div>
















                    <!-- <div class="w-8/12" style="height: calc(100vh - 180px);"> -->
                    <div class="w-8/12" style="width: 100% !important;">

                    <?php
                    // you cannot add subfolder path in env.
                    // if you have a subfolder in idrive, add it to the path in your code.
                    $file = '/finished/';
                    $file .= $cert->file_name;
                    $docUrl = Storage::disk('idrive_e2')->temporaryUrl($file, now()->addMinutes(5));
                    $docUrl .= '#zoom=150';
                    ?>

                            <div class="w-full h-full">
                            <iframe class="embed-responsive-item w-full h-full" src="{{ $docUrl }}" allowfullscreen></iframe>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection