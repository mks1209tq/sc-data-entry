@extends('layouts.app')

    @section('content')
    <div class="pt-3">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end my-2">
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
                            <label class="hidden block text-gray-700 text-sm font-bold mb-2 " for="order_id">
                                Single PO
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="single_po" 
                                   type="hidden" 
                                   name="single_po" 
                                   value="1"
                                   {{ old('single_po', $cert->single_po) ? 'checked' : ''}}
                                   
                                >
                        </div>

                        <div class="mb-4">
                            
                                
                        </div>

                        

                        <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                            type="submit">
                                    Single PO
                                </button>
                               
                                
                            </div>
                        </form>







                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                                             

                        

                        
                        <div class="mb-4">
                            <label class="hidden block text-gray-700 text-sm font-bold mb-2" for="single_po">
                                Multi PO
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="advance_amount" 
                                   type="hidden" 
                                   name="advance_amount" 
                                   value="1"
                                   {{ old('advance_amount', $cert->advance_amount) ? 'checked' : ''}}
                                >
                        </div>

                                              

                        <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mr-2 rounded focus:outline-none focus:shadow-outline" 
                                            type="submit">
                                    Multiple PO
                                </button>
                                
                               
                            </div>
                          
                        </form>




                        <form action="{{ route('certs.update', $cert->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{ $cert->id }}">
       
                                             

                        

                        
                        <div class="mb-4">
                            <label class="hidden block text-gray-700 text-sm font-bold mb-2" for="single_po">
                                Issue
                            </label>
                            <input class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                   id="col1" 
                                   type="hidden" 
                                   name="col1" 
                                   value="1"
                                   {{ old('col1', $cert->col1) ? 'checked' : ''}}
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