@extends('layouts.app')

    @section('content')
    <div class="pt-3">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between my-2">
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"href="{{ route('certs.edit', $cert->id) }}">
                                {{ $cert->user() ? $cert->user->id . ' - ' . $cert->user->name : 'Unassigned' }}
                            </a> 
                            @if(auth()->user() && auth()->user()->is_admin)
                                <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('certs.show', $cert->id) }}">
                                    Show Record
                                </a>
                            @endif    
            <a href="{{ route('dashboard') }}" 
                                   class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                                    Cancel
                                    </a>
                                    
                                                     
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-row">
                    <div class="flex flex-col ">
                    <div class="w-4/12 px-3 w-full">
                    <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="employee_id">
                                REC_ID
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
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





                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                        <div class="mb-4">
                            
                        </div>

                        <div class="mb-4">
                            
                        </div>

                        

                        
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col2">
                                PO Year
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col2" 
                                   type="text" 
                                   name="col2" 
                                   value="{{ old('col2', $cert->col2) }}"
                                   autofocus
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col12">
                                PO Number Final
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col12" 
                                   type="text" 
                                   name="col12" 
                                   value="{{ old('col12', $cert->col12) }}"
                                    required
                                   
                                >
                        </div>


                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="col8">
                                Line amount
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col8" 
                                   type="text" 
                                   name="col8" 
                                   value="{{ old('col8', $cert->col8) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="advance_amount">
                                Advance amount
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="advance_amount" 
                                   type="text" 
                                   name="advance_amount" 
                                   value="{{ old('advance_amount', $cert->advance_amount) }}"
                                   required
                                   
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="retention_amount">
                                Retention amount
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="retention_amount" 
                                   type="text" 
                                   name="retention_amount" 
                                   value="{{ old('retention_amount', $cert->retention_amount) }}"
                                   required
                                >
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2 " for="deduction_amount">
                                Deduction amount
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="deduction_amount" 
                                   type="text" 
                                   name="deduction_amount" 
                                   value="{{ old('deduction_amount', $cert->deduction_amount) }}"
                                   required
                                >
                        </div>


                        <div class="mb-4">
                            
                                
                        </div>

                        

                        <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                            type="submit">
                                    Submit
                                </button>
                               
                                
                            </div>
                        </form>







                        




                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
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
















                    <div class="w-8/12 px-20" style="height: calc(100vh - 180px);">
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